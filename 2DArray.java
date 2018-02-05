import java.util.*;
import java.io.*;
import java.lang.Throwable;
/**
 * Read a text file with size of 2DArray in the first line
 *      and numbers in other lines.
 *      3 5
 *      13 4 8 14 1
 *      9 6 3 7 21
 *      5 12 17 9 3
 * And this program will convert all rows to columns and columns to rows.
 *
 * @author Shota Takada 
 */
public class practice
{
    public static void main(String[] args) throws FileNotFoundException{
        Scanner input = new Scanner(new File("text.txt"));
        int row = input.nextInt();
        int col = input.nextInt();
        //create 2DArray with given values
        int[][] twoDarr = new int[row][col];
        for(int i = 0; i < twoDarr.length;i++){
            for(int j = 0; j < twoDarr[i].length; j++){
                String nums = input.next();
                int item = Integer.parseInt(nums);
                twoDarr[i][j] = item;
            }
        }
        //print out the array
        String array = toString(twoDarr);
        System.out.println(array);
        
        //convert the row to column and the column to row
        int[][] arr2 = new int[col][row];
        for(int i = 0; i < col;i++){
            for(int j = 0; j < row; j++){
                arr2[i][j] = twoDarr[j][i];
            }
        }
        
        String arr = toString(arr2);
        System.out.println(arr);
    }
    public static String toString(int[][] arr){
        String result = "";
        int row = arr.length;
        int col = arr[0].length;
        
        for(int i =0; i < row; i++){
            for(int j = 0; j<col; j++){
                result += arr[i][j] + " ";
            }
            result +="\n";
        }
        return result;
    }
}
