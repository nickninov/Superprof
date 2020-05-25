-- File for more generic functions
module Functions where

-- File imports
import DataTypes

-- Library imports
import Data.Char

-- Convert user input to an Action Data type
strToAction :: String -> Maybe Action
strToAction choice = (case (map toLower choice) of
    -- Go North
    "north" -> Just North
    "n" -> Just North
    -- Go South
    "south" -> Just South
    "s" -> Just South
    -- Go East
    "east" -> Just East
    "e" -> Just East
    -- Go West
    "west" -> Just West
    "w" -> Just West
    -- Browse Inventory
    "inventory" -> Just Inventory
    "i" -> Just Inventory
    -- Invalid input
    otherwise -> Nothing)

-- Remove Maybe from the Action data type
removeMaybeAction :: Maybe Action -> Action
removeMaybeAction action
    | action == Just North = North
    | action == Just South = South
    | action == Just East = East
    | action == Just West = West
    | action == Just Inventory = Inventory

-- Display bag items in the console
showBag :: Inventory -> Counter -> IO ()
showBag [] _ = putStr "\n"
showBag (x:xs) count
    | x == HouseKey = do
        putStrLn ( show count ++ ") House key\n")
        showBag xs (count+1)
    | x == BedroomKey = do
        putStrLn ( show count ++ ") Bedroom key\n")
        showBag xs (count+1)
    | x == Flashlight = do
        putStrLn ( show count ++ ") Flashlight\n")
        showBag xs (count+1)

-- Check if item is in the inventory
findItem :: Inventory -> Item -> Bool
findItem [] _ = False
findItem (x:xs) item =
    -- Check if the head of the list matches with the selected item
    if x == item 
        then True
    else findItem xs item

-- Displays all the available commands the player can do within a room
displayOptions :: Options -> IO ()
displayOptions [] = putStr ""
displayOptions (x:xs) = do
    putStrLn (x ++ "\n")
    displayOptions xs

-- Check if the user's input is valid from the given options
validOption :: Input -> Options -> Bool
validOption input options = any (== input) options

-- Remove an aciton from a list
removeAction :: [String] -> String -> [String]
removeAction [] option = []
removeAction (x:xs) option =
    -- Check if current option matches with selected option
    if x == option
        then removeAction xs option
    else [x] ++ removeAction xs option

-- Cleans the screen as the :!clear command
clear :: IO ()
clear = do
    putStr "\ESC#8"
    putStr "\ESC[2J"

-- Game loop indicator
dash :: IO ()
dash = putStrLn "------------------------------------\n"

-- Beginning instructions
instructions :: IO ()
instructions = do
    dash

    putStrLn "You were randomly teleported into somebody's house!\n\nEscape before the tenants come back!\n"
    putStrLn "How to play:\n"
    putStrLn "Type north (n), south (s), east (e) or west (w) to move.\n"