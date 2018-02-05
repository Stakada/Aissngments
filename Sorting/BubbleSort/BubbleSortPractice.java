import java.util.*;
/**
 * This program get size of the array and asks a uesr to enter numbers to 
 * load in the array. 
 * Print out number of swap occured 
 *
 * @author Shota Takada
 */
public class BubbleSortPractice
{
    public static int bubble(int[] arr){
        int temp, count = 0;
        boolean swap;
        
        for(int i = 0; i< arr.length-1; i++){
            swap = false;
            for(int j = 0; j < arr.length - i - 1; j++){
                if(arr[j] > arr[j+1]){
                    temp = arr[j];
                    arr[j] = arr[j+1];
                    arr[j+1] = temp;
                    swap = true;
                    count++;
                }    

            }
            if(swap == false){
                break;
            }
        }
        return count;
    }
    public static void printArr(int[] arr){
        for(int i = 0; i< arr.length; i++){
            System.out.print(arr[i]+ " ");
        }
        System.out.println();
    }
    public static void main(String args[]){
        Scanner input = new Scanner(System.in);
        int size = input.nextInt();
        int[] arr = new int[size];
        for(int i=0; i< arr.length; i++){
            arr[i] = input.nextInt();
        }
        printArr(arr);
        int count = bubble(arr);
        System.out.println(count + " times swapped occured.");
        printArr(arr);
    }
}
