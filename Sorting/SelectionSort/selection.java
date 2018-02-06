import java.util.*;
class TestClass {
    public static void main(String args[] ) throws Exception {
        Scanner s = new Scanner(System.in);
        int size = s.nextInt();
        int[] arr = new int[size]; //array for the input 
        int[] index = new int[size]; //array for the index of the first array's elements
        for(int i = 0; i< size; i++){
            arr[i] = s.nextInt();
            index[i] = arr[i];
        }
        printArr(arr);
        
        
        //Insertion Sort
        for(int i = 1;i<size; i++){ //iterate from [1] to [last element]
            int key = arr[i];
            int j = i-1;
            while(j>=0 && arr[j] > key){ 
                arr[j+1] = arr[j];
                j--;
            }
            arr[j+1] = key;
        }
        printArr(arr);
        
        //find index
        for(int i = 0; i < size; i++){
            //int ind = arr[i];
            for(int j = 0; j< size; j++){
                if(index[i] == arr[j]) index[i] = j + 1;
            }
        }
        /*
        for(int i=0;i<indexa.length;i++){
            for(int j=0;j<a.length;j++){
                if(indexa[i]==a[j]){
                    indexa[i]=j+1;
                }
            }
        }
        */
        printArr(index);
        
    }
    public static void printArr(int[] arr){
        for(int num: arr){
            System.out.print(num + " ");
        }
        System.out.println();
    }
}