-- Launches the game

-- File imports
import DataTypes
import Engine
import Functions

-- Launches the game
main :: IO ()
main = do
    -- Game title
    putStrLn "Antonio Bryan Ferdico's Text Adventure Game\n"

    let player = Character "Malte Ressin" []
    
    -- How to play instructions
    instructions

    -- Set initial room
    let room = Room "Hall" "You see a very sophisticated Turing Machine drawing." [(West, "Storage"), (East, "Bedroom"), (North, "Kitchen"), (South, "Exit")]
    
    -- Launch the game
    gameLoop player room
