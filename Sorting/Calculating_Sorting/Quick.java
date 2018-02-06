
/**
 * Write a description of class Quick here.
 *
 * @author (your name)
 * @version (a version number or a date)
 */
public class Quick
{   
    public void sort(int[] arr){
        sort(arr, 0, arr.length-1);
    }
    private void sort(int[] arr,int lo,int hi){
        if(lo < hi){
            int pi = partition(arr, lo, hi); 
        
            sort(arr, lo, pi-1);
            sort(arr, pi+1, hi);
        }
    }
    private int partition(int[] arr,int lo,int hi){
        int pivot = arr[hi];
        int i = lo-1; //i is -1
        
        for(int j = lo; j< hi; j++){
            if(arr[j] <= pivot){
                i++;
                
                //swap arr[i] and arr[j]
                int temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        
        }
        //swap arr[i+1] and arr[hi]
        int temp = arr[i+1];
        arr[i+1] = arr[hi];
        arr[hi] = temp;
        
        return i+1;
    }
}
