#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "header.h"
#include "functions.c"


/*
- add items 
- delete items
- edit items
- search for items
- save data to a file
- load saved items from a file
*/
//it makes you add item details



int main(){
    int number;
    int size = 5;
    int counter = 0;
    int edit_number;
    int edit_detail;
    int item_number;
    struct manga *items;
    FILE * fp;

    items = (struct manga*) malloc(size * sizeof(struct manga));
    
    do{
        //shows menu and gets user's choice
        show_menu();
        getInt(&number,"enter a number");

        switch(number){

            //this lets you add an item
            case 1:
                items[counter] = add_item();
                if (counter == size){
                    size = size * 2;
                    items = realloc(items, size * sizeof(struct manga));
                }
                counter += 1;
                break;

            //to delete items
            case 2:
                if (counter > 0){
                    delete_item(items, &counter);
                }
                else{
                    printf("\nyou have no items\n\n");
                }
                break;
            
            //to edit items
            case 3:
                if (counter == 0){
                    printf("\nYou have no items\n\n");
                }
                else{
                    show_manga(items, counter);
                    getInt(&item_number ,"Enter which item you would like to edit");
                    if ((item_number - 1) >= 0 && (item_number - 1) <= counter){
                        edit_item(items + (item_number - 1));
                    }
                    else{
                        printf("invalid number");
                    }
                }
                break;
                
            //this shows the items 
            case 4:
                show_manga(items, counter);
                break;

            //this lets you search for items
            case 5:
                search_items(&counter, items);
                break;

            //this lets you save your items to a file
            case 6:
                saveData(items, counter);
                break;

            //this loads your saved items from the file
            case 7:
                fp = fopen("data.bin", "rb");
                
                if(fp == NULL){
                    // Display error message - No such file or directory
                    printf("Error - could not find file to load...\n");
                }
                else {
                    // Read the number of mangas that will be
                    fread(&counter, sizeof(int), 1, fp);
                    // Double the capacity based on the read size of mangas
                    size = size * 2;
                    items = realloc(items, size * sizeof(struct manga));
                    fread(items, sizeof(struct manga), counter, fp);
                    printf("File has been loaded successfully!\n");
                }

                fclose(fp);

                break;

            //if invalid number is given
            default:
                printf("pick one of the numbers above");
                break;
        
        }

    //this lets you exit the program
    }while(number != 8);

}
