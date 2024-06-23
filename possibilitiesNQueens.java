import java.util.Scanner;

public class possibilitiesNQueens{
    static int count;

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

        for(i = row, j = col;i < board.length && j >= 0;i ++ , j -- ){
            if(board[i][j] == 1)
                return false;
        }

        return true;
    }

    public static void Solution(int board[][], int col, int N){
        if(col == N){
            printQueens(board);
            count++;
            return ;
        }

        for (int i = 0; i < board.length; i ++ ) {
            if(isPlaceble(board, i, col)){
                board[i][col] = 1;
                Solution(board,col+1,N);
                board[i][col] = 0;
            }
        }
    }

    public static void printQueens(int board[][]){
        for (int i = 0; i < board.length; i ++ ) {
            for (int j = 0; j < board.length; j ++ ) {
                System.out.print(" "+board[i][j]);
            }
            System.out.println();
        }
        System.out.println();
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Enter the No of queens to be placed:\t");
        int N = sc.nextInt();
        int board[][] = new int[N][N];
        for (int i = 0; i < N; i ++ ) {
            for (int j = 0; j < N; j ++ ) {
                board[i][j] = 0;
            }
        }
        Solution(board, 0,N);
        System.out.println(count +" solution are there for "+ N+" queens problems" );
    }
}

