
/**
 *
 * 
 */
public class Merge
{
    // instance variables - replace the example below with your own
    private static int[] aux;

    
    public static void sort(int[] arr){
        aux = new int[arr.length];
        sort(arr, 0, arr.length-1);
        
        
    }

    
    private static void sort(int[] arr, int lo, int hi){
        
        if(lo < hi){
            int mid = lo + (hi - lo)/2;
            sort(arr, lo, mid);
            sort(arr, mid + 1, hi);
            merge(arr, lo, mid, hi);
        }
    }
    public static void merge(int[] arr, int lo, int mid, int hi){
        for(int i = lo; i <= hi; i++){//copying arr to aux
            aux[i] = arr[i];
        }
        
        int i = lo;
        int j = mid + 1;
        int k = lo;
        while(i <= mid && j <= hi){
            if(aux[i]<= aux[j]){
                arr[k] = aux[i++];
                
                
            } else{
                arr[k] = aux[j++];
                
            }
            k++;
        }
        while(i <= mid){
            arr[k] = aux[i++];
            k++;
        }
        
    
    }
}
