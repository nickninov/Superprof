-- The game engine logic
module Engine where

-- File imports
import DataTypes
import Functions

-- Library imports
import Data.Char

-- The main game loop
gameLoop :: Character -> Room -> IO ()
gameLoop player room = do

    -- Description of current room
    putStrLn ("Location: " ++ roomName room ++ "\n")
    putStrLn (description room ++ "\n")

    -- Game loop indicator
    dash

    -- Get user's choice
    putStr ("*Action> ")
    choice <- getLine
    putStr ("\n")
    let action = strToAction choice

    -- Check if action was invalid
    if action == Nothing
        then do
            putStrLn "Invalid input...\n"
            gameLoop player room
    -- Input was valid
    else do
        -- Convert Maybe Action to Action
        let choice = removeMaybeAction action 
        -- Check if inventory should be open or player needs to go to a room
        checkAction player choice room


-- Check Action - go to room or check inventory
checkAction :: Character -> Action -> Room -> IO ()
checkAction player action room = do
    if action == Inventory 
        then do
            -- Check if inventory is empty
            if length (inventory player) > 0
                then do
                    putStrLn "You have:\n"
                    showBag (inventory player) 1
                    -- Go back to main loop
                    gameLoop player room

            -- Inventory is empty
            else do
                putStrLn "Inventory is empty...\n"
                -- Go back to main loop
                gameLoop player room
    else do
        -- Check where to go
        let newRoom = [location | location <- directions room, fst location == action]

        checkRoomState player newRoom room

-- Check the room's state
checkRoomState :: Character -> [RoomAction] -> Room -> IO ()
checkRoomState player roomInfo room 
    -- Invalid state
    | roomInfo == [] = do
        putStrLn "Nothing there...\n"
        gameLoop player room
    
    -- Go to storage room
    | (snd $ head roomInfo) == "Storage" = do
        -- Check if player has a lightbulb
        if findItem (inventory player) Flashlight == True
            -- Player has a lightbulb
            then do 
                putStrLn "You turn on your flashlight and enter the Storage room"
                -- Start storage room interaction
                let options = ["check shelves", "check bucket", "check shoes", "open box"]
                storageInteraction player options
        -- Player does not have a flashlight
        else do 
            putStrLn ((charName player)++": I am scared from the dark! I need a flashlight!\n\nYou go back.\n")
            -- Go back to main loop with the same room 
            gameLoop player room

    -- Go to bedroom
    | (snd $ head roomInfo) == "Bedroom" = do
        -- Check if player has a key to unlock the bedroom
        if findItem (inventory player) BedroomKey == True
            -- Player has a key
            then do
                -- Start storage room interaction
                let options = ["look under bed", "look under pillows", "check desk", "check behind painting"]
                berdoomInteraction player options
        -- Player does not have a key
        else do
            putStrLn "Room is locked!\nFind the key to unlock it.\n"
            -- Go back to main loop with the same room 
            gameLoop player room

    -- Go to kitchen
    | (snd $ head roomInfo) == "Kitchen" = do
        -- Start kitchen interaction
        let options = ["open microwave", "open oven", "open drawers", "open cupboards", "look on table", "look under table", "look under chairs"]
        kitchenInteraction player options

    -- Go to Hall
    | (snd $ head roomInfo) == "Hall" = do
        let newRoom = Room "Hall" "You see a very sophisticated Turing Machine drawing." [(West, "Storage"), (East, "Bedroom"), (North, "Kitchen"), (South, "Exit")]
        -- Go back to main loop with the new room
        gameLoop player newRoom

    | (snd $ head roomInfo) == "Exit" = do
        -- Check if player has a key to unlock the exit door
        if findItem (inventory player) HouseKey == True
            -- Player has the key
            then do
                putStrLn "Thank you for playing!\nThe end!"
        -- Player does not have a key to exit the game
        else do
            putStrLn "Exit door is locked!\nFind the key to unlock it.\n"
            -- Go back to main loop with the same room 
            gameLoop player room

---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------

-- Kitchen game engine
kitchenInteraction :: Character -> Options -> IO ()
kitchenInteraction player actions = do 
    -- Check if player has a flashlight
    if findItem (inventory player) Flashlight == True
        -- Player has a flashlight
        then do
            putStrLn ("There is nothing else " ++ charName player ++ " can take.\n")
            let newRoom = Room "Kitchen" "The kitchen is a mess...\n\nYou have already been here." [(South, "Hall"), (West, "Storage"), (East, "Bedroom")]
            -- Go back to game loop
            gameLoop player newRoom
    -- Player does not have a flashlight - they need to find it
    else do
        let newRoom = Room "Kitchen" "The kitchen looks clean. There must be people living here.\n\nThere is a table with chairs, a couple of drawers and cupboards, an oven and a microwave.\n" [(South, "Hall"), (West, "Storage"), (East, "Bedroom")]
        putStrLn ((description newRoom) ++ "\n")
        putStrLn((charName player) ++": I need to be quick, before the tenants come back!\n")
        putStrLn("Available actions:\n")

        -- Show the player all the available actions
        displayOptions actions

        -- Get user's input
        putStr "*Action> "
        option <- getLine
        putStrLn ""
        
        -- Check if user's input is valid
        if (validOption option actions) == True
            -- Input is valid
            then do
                -- Updated available actions
                let newActions = removeAction actions option
                kitchenAction option player newActions
        -- Input was invalid
        else do
            putStrLn "Input was invalid...\n"
            kitchenInteraction player actions

-- Commands parser
kitchenAction :: Input -> Character -> Options -> IO ()
kitchenAction option player actions = (case (map toLower option) of
    -- Open  microwave
    "open microwave" -> do 
        putStrLn "You open the microwave. There is a dead rat inside.\n"
        dash
        kitchenInteraction player actions
    
    -- Open oven
    "open oven" -> do
        putStrLn "You open the oven. You find the flashlight inside.\n"
        putStrLn((charName player)++": Was zum...?\n")

        -- Put item inside the character's bag
        let newPlayer = Character (charName player) (inventory player ++ [Flashlight])
        -- Update Kitchen 
        let room = Room "Kitchen" "The kitchen is a mess..." [(South, "Hall"), (West, "Storage"), (East, "Bedroom")]
        gameLoop newPlayer room
    -- Open drawers
    "open drawers" -> do
        putStrLn "You open the drawers. They are full with bones.\n"
        dash
        kitchenInteraction player actions
    -- Open cupboards
    "open cupboards" -> do
        putStrLn "You open the cupboards. They are full with alcohol.\n"
        dash
        kitchenInteraction player actions
    -- Look under table
    "look on table" -> do
        putStrLn "You look under the table. You see a pool of blood.\n"
        dash
        kitchenInteraction player actions
    -- Look under chairs
    "look under chairs" -> do
        putStrLn "You look under the chairs. You see chopped off fingers.\n"
        dash
        kitchenInteraction player actions
    -- Invalid option
    otherwise -> do
        putStrLn "Invalid input...\n"
        dash
        kitchenInteraction player actions
    )

---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------

-- Storage game engine
storageInteraction :: Character -> Options -> IO ()
storageInteraction player actions = do
 -- Check if player has the bedroom key
    if findItem (inventory player) BedroomKey == True
        -- Player has a has the bedroom key
        then do
            putStrLn ("There is nothing else " ++ charName player ++ " can take.\n")
            let newRoom = Room "Storage" "The storage is a mess...\nYou have already been here." [(East, "Hall"), (North, "Kitchen")]
            -- Go back to game loop
            gameLoop player newRoom
    -- Player does not have a flashlight - they need to find it
    else do
        let newRoom = Room "Storage" "The storage room smells weird.\n\nThere are some shelves, a box, a bucket and a pair of shoes.\n" [(South, "Hall"), (West, "Storage"), (East, "Bedroom")]
        putStrLn ((description newRoom) ++ "\n")
        putStrLn((charName player) ++": Aaahhh! I am scared of rats!\n")
        putStrLn("Available actions:\n")

        -- Show the player all the available actions
        displayOptions actions

        -- Get user's input
        putStr "*Action> "
        option <- getLine
        putStrLn ""
        
        -- Check if user's input is valid
        if (validOption option actions) == True
            -- Input is valid
            then do
                -- Updated available actions
                let newActions = removeAction actions option
                storageAction option player newActions
        -- Input was invalid
        else do
            putStrLn "Input was invalid...\n"
            storageInteraction player actions

-- Commands parser
storageAction :: Input -> Character -> Options -> IO ()
storageAction option player actions = (case (map toLower option) of
    -- Check shelves
    "check shelves" -> do 
        putStrLn ((charName player)++": Achooo! That was dusty!\n")
        dash
        storageInteraction player actions
    
    -- Check bucket
    "check bucket" -> do
        putStrLn ((charName player)++": Egh! Is that piss?\n\nAlthough you are disgusted, you still check inside and find the key.\n")
        -- Put item inside the character's bag
        let newPlayer = Character (charName player) (inventory player ++ [BedroomKey])
        -- Update Storage room 
        let room = Room "Storage" "The storage room is a mess..." [(East, "Hall"), (North, "Kitchen")]
        gameLoop newPlayer room

    -- Check shoes
    "check shoes" -> do
        putStrLn "You the pair of shoes. They are full with bones.\n"
        dash
        storageInteraction player actions

    -- Open box
    "open box" -> do
        putStrLn "You see a Context Free Grammar Pumping Lemma. You are tempted to interact with it!\n"
        dash
        storageInteraction player actions
    )

---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------
---------------------------------------------------------------------

-- Bedroom game engine
berdoomInteraction :: Character -> Options -> IO ()
berdoomInteraction player actions = do
    -- Check if player has the house key
    if findItem (inventory player) HouseKey == True
        -- Player has a has the house key
        then do
            putStrLn ("There is nothing else " ++ charName player ++ " can take.\n")
            let newRoom = Room "Bedroom" "The bedroom is a mess...\nYou have already been here." [(West, "Hall"), (North, "Kitchen")] 
            -- Go back to game loop
            gameLoop player newRoom
    -- Player does not have the house key - they need to find it
    else do
        let newRoom = Room "Bedroom" "You feel that a Regular Expression Pumping Lemma is staring into your soul!\n\nThere is a painting and a bed with some pillows.\n" [(West, "Hall"), (North, "Kitchen")] 
        putStrLn ((description newRoom) ++ "\n")
        putStrLn((charName player) ++": Aaahhh! I am scared of rats!\n")
        putStrLn("Available actions:\n")

        -- Show the player all the available actions
        displayOptions actions

        -- Get user's input
        putStr "*Action> "
        option <- getLine
        putStrLn ""
        
        -- Check if user's input is valid
        if (validOption option actions) == True
            -- Input is valid
            then do
                -- Updated available actions
                let newActions = removeAction actions option
                bedroomAction option player newActions
        -- Input was invalid
        else do
            putStrLn "Input was invalid...\n"
            berdoomInteraction player actions

-- Commands parser
bedroomAction :: Input -> Character -> Options -> IO ()
bedroomAction option player actions = (case (map toLower option) of
    -- Check desk
    "check desk" -> do 
        putStrLn ("The desk is empty.\n")
        dash
        berdoomInteraction player actions
    
    -- Check behind painting
    "check behind painting" -> do
        putStrLn ("You check behind the Tupac painting. You found the key!\n")
        -- Put item inside the character's bag
        let newPlayer = Character (charName player) (inventory player ++ [HouseKey])
        -- Update Storage room 
        let room = Room "Bedroom" "The bedroom is a mess... You have already been here." [(West, "Hall"), (North, "Kitchen")] 
        gameLoop newPlayer room

    -- Look under bed
    "look under bed" -> do
        putStrLn ("You see a skeleton!\n\n"++ (charName player) ++": Agh! I am scared! I want to get out of this blutig haus!")
        dash
        berdoomInteraction player actions

    -- Look under pillows
    "look under pillows" -> do
        putStrLn "You see a bag of cocaine.\n\n"
        dash
        berdoomInteraction player actions
    )         