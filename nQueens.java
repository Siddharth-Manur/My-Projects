import java.util.Scanner;

public class nQueens{
    static Scanner sc = new Scanner(System.in);
    static int N = sc.nextInt();

    public static boolean isPlaceble(int board[][], int row, int col){
        int i, j;
        for (i = 0; i < col; i ++ ) {
            if(board[row][i] == 1)
                return false;
        }

        for(i = row, j = col;i >= 0 && j >= 0;i -- , j -- ){
            if(board[i][j] == 1)
                return false;
        }

        for(i = row, j = col;i < N && j >= 0;i ++ , j -- ){
            if(board[i][j] == 1)
                return false;
        }

        return true;
    }

    public static boolean Solution(int board[][], int col){
        if(col == N){
            return true;
        }

        for (int i = 0; i < N; i ++ ) {
            if(isPlaceble(board, i, col)){
                board[i][col] = 1;
                if(Solution(board, col+1) == true)
                    return true;
                board[i][col] = 0;
            }
        }
        return false;
    }

    public static void printQueens(int board[][]){
        for (int i = 0; i < board.length; i ++ ) {
            for (int j = 0; j < board.length; j ++ ) {
                System.out.print(" "+board[i][j]);
            }
            System.out.println();
        }
    }

    public static void main(String[] args) {
        int board[][] = new int[N][N];
        for (int i = 0; i < N; i ++ ) {
            for (int j = 0; j < N; j ++ ) {
                board[i][j] = 0;
            }
        }
        if(Solution(board, 0) == false){
            System.out.println("no solution");
        }
        printQueens(board);
    }
}
