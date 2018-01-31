
public class SelectionSort
{
    
    public void sort(int[] arr){
        for(int i = 0; i< arr.length-1; i++){
            int minI = i;//index of minimum num in the array
            for(int j = i+1;j < arr.length; j++){
                if(arr[j] < arr[minI]){
                    minI = j;
                }
            }
            int temp = arr[minI];
            arr[minI]  = arr[i];
            arr[i] = temp;
        }
        
    }
}
