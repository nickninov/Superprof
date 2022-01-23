/*
option - the variable that you assign a value to
txt - the prompt
This function assigns an integer to a pointer
*/
void getInt(int *option, char txt []){
    printf("%s: ", txt);
    char str_i[10];
    fgets(str_i, 10, stdin);
    *option = strtol(str_i, NULL, 10);
}

/*
*option - the variable that you assign a value to
txt - the prompt
This function assigns a float to a pointer
*/
void getFloat(float *option, char txt []){
    printf("%s: ", txt);
    char str_i[10];
    fgets(str_i, 10, stdin);
    *option = strtod(str_i, NULL);
}

/*
it lets the user enter struct manga and then it returns item
*/
struct manga add_item(){
    struct manga item;
    printf("enter the name of the item: ");
    fgets(item.name, NAME_LENGTH, stdin);
    getFloat(&item.price,"enter the price");
    getInt(&item.quantity,"enter the quantity");
    printf("enter the creator name: ");
    fgets(item.creator, NAME_LENGTH, stdin);
    return item;
}

//it lets you edit items
void edit_item(struct manga *item){
    int edit_detail;

    printf("1. item name\n");
    printf("2. item price\n");
    printf("3. item quantity\n");
    printf("4. item creator\n");
    //this gets what you want to edit
    getInt(&edit_detail,"enter what you would like to edit");

    //this lets you edit the detail of the item you want to edit
    //it lets you edit the item name
    if(edit_detail == 1){
        printf("enter a new item name:\n");
        fgets(item->name, NAME_LENGTH, stdin);
    }
    
    //it lets you edit the item price
    else if(edit_detail == 2){
        getFloat(&item->price,"enter the new price");
    }

    //it lets you edit the item quantity
    else if(edit_detail == 3){
        getInt(&item->quantity,"enter a new quantity");
    }

    //it lets you edit the item creator
    else if (edit_detail == 4){
        printf("enter a new item creator:\n");
        fgets(item->creator, NAME_LENGTH, stdin);
    }

    //if you enter a different number, it prints this
    else{
        printf("not a valid option\n");
    }
    
}

//this prints all struct manga details in memory
void show_manga(struct manga *items, int counter){
    float total_cost = 0;
    if(counter == 0){
        printf("\nnothing to show\n\n");
    }
    //if the array is not empty, it prints out all the items
    else{
        for(int i = 0; i < counter; i++){
            printf("\n%d\n",i + 1);
            printf("manga name: %s", (items + i)->name);
            printf("manga price: %.2f\n", (items + i)->price);
            printf("manga quantity: %d\n", (items + i)->quantity);
            printf("manga creator: %s", (items + i)->creator);
            printf("manga total price: %.2f", (items + i)->quantity * (items + i)->price);
            total_cost += (items + i)->price * (items + i)->quantity;
        }
        printf("\ntotal cost: %.2f\n\n", total_cost);
        
    }
}



//this prints the menu
void show_menu(){
    printf("1. Add an item  🦶\n");
    printf("2. Delete an item  🌞\n");
    printf("3. Edit an item  🫀\n");
    printf("4. Show items  🚷\n");
    printf("5. Search for an item  💩\n");
    printf("6. Save data to a file  🎏\n");
    printf("7. Load saved items from a file 🔫\n");
    printf("8. Exit  🚼\n");
}


//this lets you delete an item
void delete_item(struct manga *items, int *counter){
    int item_number;
    if (counter > 0){
        show_manga(items, *counter);

        //this asks what you want to delete
        getInt(&item_number,"What do you want to delete");
        item_number -= 1;
        printf("item number: %d\n", item_number);
        printf("item counter: %d\n", *counter);
        //this part squishes the number you want to delete out of the array
         if (item_number >= 0 && item_number < *counter){
                //if it's the last item in the array, it moves the item forward instead of backwards
                if(item_number < *counter - 1){
                    for (int i = item_number; i < *counter; i++) {
                        (items + i) -> price = (items + i + 1) -> price;
                        (items + i) -> quantity = (items + i + 1) -> quantity;
                        strcpy((items + i) -> creator, (items + i + 1) -> creator); 
                        strcpy((items + i) -> name, (items + i + 1) -> name);
                    }
                }
                *counter -= 1;
         }

    }
    else{
        printf("you have no items");

    }

}


//this lets you enter what you want to search by and it returns all the items under that search
void search_items(int *counter, struct manga *items){
    int quantity;
    float price;
    char name[NAME_LENGTH];
    char creator[NAME_LENGTH];
    int search_number;

    printf("1. search by name\n");
    printf("2. search by price\n");
    printf("3. search by quantity\n");
    printf("4. search by creator\n");
    getInt(&search_number,"enter a number");
    switch(search_number){
        //if you enter 1, it lets you search for items with a specific name
        case 1:
        printf("enter which name you would like to search by:\n");
        fgets(name, NAME_LENGTH, stdin);
        for (int i = 0; i <= *counter; i++){
            int result = strcmp(name, (items + i)->name);
            if(result == 0){
                    printf("manga name: %s",(items + i)->name );
                    printf("manga price: %.2f\n", (items + i)->price);
                    printf("manga quantity: %d\n", (items + i)->quantity);
                    printf("manga creator: %s\n", (items + i)->creator);
            }
        }
            break;

        //if you enter 2 it lets you search for items with a specific price
        case 2:
            getFloat(&price, "enter which price you would like to search for");
            for (int i = 0; i <= *counter; i++){
                if(price == (items + i)->price){
                    printf("manga name: %s",(items + i)->name );
                    printf("manga price: %.2f\n", (items + i)->price);
                    printf("manga quantity: %d\n", (items + i)->quantity);
                    printf("manga creator: %s\n", (items + i)->creator);
                }
            }
        break;

        //if you press 3 it lets you search for items with a specific quantity
        case 3:
            getInt(&quantity, "enter which quantity you would like to search for");
            for (int i = 0; i <= *counter; i++){
                if(quantity == (items + i)->quantity){
                    printf("manga name: %s",(items + i)->name );
                    printf("manga price: %.2f\n", (items + i)->price);
                    printf("manga quantity: %d\n", (items + i)->quantity);
                    printf("manga creator: %s\n", (items + i)->creator);
                }
            }
            break;

        //if you enter 4, you can search for items with a specific creator
        case 4:
            printf("enter which creator you would like to search by:\n");
            fgets(creator, NAME_LENGTH, stdin);
            for(int i = 0; i <= *counter; i++){
                int result = strcmp(creator, (items + i)->creator);
                if(result == 0){
                    printf("manga name: %s",(items + i)->name );
                    printf("manga price: %.2f\n", (items + i)->price);
                    printf("manga quantity: %d\n", (items + i)->quantity);
                    printf("manga creator: %s\n", (items + i)->creator);
                }
            }
            break;

    }
}

// Save the data in a file
void saveData(struct manga * item, int size){
    // File pointer
    FILE * fP = fopen("data.bin", "wb");
    // Check if file exists
    if(fP != NULL){
        // Store the number of records that will be saved
        fwrite(&size, sizeof(int), 1, fP);
        // Store the data in the file
        fwrite(item, sizeof(struct manga), size, fP);
        // Success message
        printf("Data saved successfully!\n\n");
    }
    // File could not be created
    else{
        printf("File could not be created...\n\n");
        exit(EXIT_FAILURE);
    }
    // Close the file
    fclose(fP);
}