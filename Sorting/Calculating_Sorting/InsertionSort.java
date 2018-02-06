
public class InsertionSort
{
    
    public void sort(int[] arr){
        int n = arr.length;
        //iterate from index 1 to index [length-1]
        for(int i = 1; i < n; i++){
            int key = arr[i]; //set key first
            int j = i-1;
            while(j>=0 && arr[j] > key){
                arr[j+1] = arr[j];
                j--;
            }
            arr[j + 1] = key;
        }
    
         
    }
}
