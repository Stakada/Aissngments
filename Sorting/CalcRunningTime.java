import java.util.Random;
/**
 * Write a program that randomly generates 100,000 integers into an array.
 * Write a method that sorts this large array using shell sort,
 *       a method that sorts this large array using insertion sort,
 *       a method that sorts this large array using selection.
 *
 * @Shota Takada
 * @Jan 16th, 2018
 */
public class CalcRunningTime{
    static long start, end ;
    static int[] arr;
    public static void printArr(int[] arr){
        System.out.print("{");
        for(int i = 0; i < arr.length-1; i++){
            System.out.print(arr[i] + ", ");
         
        }
        System.out.print(arr[arr.length-1] + "}");
        System.out.println();
    }
    
    
    /*
     * this method will provide an array with elements that randomly given. 
     */
    public static int[] creatArr(){
        int[] a = new int[1000000];
        Random rand = new Random();
        for(int i = 0; i < a.length;i++){
            int rNum = rand.nextInt(100);
            a[i] = rNum;
        }
        return a;
    }
    public static void main(String[] args){
        //Instantiate sorting objects
        SelectionSort selec = new SelectionSort();
        InsertionSort inser = new InsertionSort();
        ShellSort shell = new ShellSort();
        Merge merge = new Merge();
        Quick quick = new Quick();
        // sorting uses this one array to sort
        int[] array = creatArr();
        
        /******************/
        /**Selection Sort**/
        /******************/
        arr = array;
        //calculate running time in milliseconds
        start = System.currentTimeMillis();
        selec.sort(arr);
        end =System.currentTimeMillis();
    
        System.out.println("The running time : "+ (end - start) + " milliseconds");
 
        /*****************/
        /**InsertionSort**/
        /*****************/
        arr = array;
        //calculate running time in milliseconds
        start = System.currentTimeMillis();
        inser.sort(arr);
        end =System.currentTimeMillis();
        
        System.out.println("The running time : "+ (end - start) + " milliseconds");
        
        /*************/
        /**ShellSort**/
        /*************/
        arr = array;
        
        //calculate running time in milliseconds
        start = System.currentTimeMillis();
        shell.sort(arr);
        end =System.currentTimeMillis();
        
        System.out.println("The running time : "+ (end - start) + " milliseconds");
        
        /*************/
        /**Merge Sort**/
        /*************/ 
        
        arr = array;
        
        //calculate running time in milliseconds
        start = System.currentTimeMillis();
        merge.sort(arr);
        end =System.currentTimeMillis();
        
        System.out.println("The running time : "+ (end - start) + " milliseconds");
        
        /*************/
        /**Quick Sort**/
        /*************/
        arr = array;
        
        //calculate running time in milliseconds
        start = System.currentTimeMillis();
        quick.sort(arr);
        end =System.currentTimeMillis();
        
        System.out.println("The running time : "+ (end - start) + " milliseconds");
    }
}
