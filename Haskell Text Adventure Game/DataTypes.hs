-- Contains all the different data types that are usind in the game
module DataTypes where

type Name = String
type Description = String
type Inventory = [Item]
type RoomAction = (Action, Name)
type Counter = Int
type Options = [String]
type Input = String

-- The items items that appear in the game
data Item = HouseKey | BedroomKey | Flashlight | Empty
    deriving (Show, Eq, Read)
{-
    HouseKey - A key found inside the bedroom.
    BedroomKey - A key found inside the storage room.
    Flashlight - A flashlight that is found inside the kitchen.
    Empty - The room does not have any items.
-}

-- Data type for one room
data Room = Room {
    roomName :: Name, -- Room's name
    description :: Description, -- Room's description
    directions :: [RoomAction] -- Which way you can go
} deriving (Show, Eq, Read)

-- Data type for the playable character
data Character = Character {
    charName :: Name, -- Character's name
    inventory :: Inventory -- Character's inventory
} deriving (Show, Eq, Read)

-- Data type for movement directions
data Action = North | South | East | West | Inventory
    deriving (Show, Eq, Read)