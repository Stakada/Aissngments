public class ShellSort
{
    
    public void sort(int[] arr){
        int n = arr.length;
        
        //start with the big gap and reduce the gap 
        for(int h = n/2; h > 0; h/=2){
            
            //gapped insertion sort for this h.
            for(int i = h; i < n; i++){
                int temp = arr[i];//save arr[i] to temp
                int j;
                for(j = i; j >= h && arr[j-h] > temp; j-=h){
                    arr[j] = arr[j-h];
                    
                }
                arr[j] = temp;
                
            }
        }
        
    }
}
