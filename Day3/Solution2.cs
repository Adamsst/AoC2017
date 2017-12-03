using System;
using System.Collections.Generic;

namespace AOC
{
	
	//As soon as I read the instructions for this part, I knew how to hard code the checks for the solution
	//In summary, Ill check all surrounding numbers before adding a new number to the gameBoard
	//I calculate that sum and throw exceptions out the window during the process
	
    class Program
    {
        static List<List<int>> gameBoard = new List<List<int>>();
        static bool oddRow = false;
        static int n = 6;
        static List<int> preTrack = new List<int>();

        static void Main(string[] args)
        {
            gameBoard.Add(new List<int> { 10, 1, 1 });
            gameBoard.Add(new List<int> { 5, 4, 2 });
            preTrack.Add(0);
            preTrack.Insert(0, 1);

            while (n <= 277678)
            {
                
                if (oddRow)
                {
                    gameBoard.Add(new List<int> { gameBoard[gameBoard.Count - 2][gameBoard[gameBoard.Count - 2].Count - 1] + gameBoard[gameBoard.Count - 2][gameBoard[gameBoard.Count - 2].Count - 2] });
                    Console.WriteLine(gameBoard[gameBoard.Count - 1][0]);

                    int i = gameBoard.Count - 1;
                    int track = 0;

                    while (gameBoard[i].Count <= gameBoard[i - 2].Count)
                    {
                        int sum = 0;

                        try
                        {
                            sum += gameBoard[gameBoard.Count - 1][gameBoard[gameBoard.Count - 1].Count - 1 - track];
                        }
                        catch (Exception ex) { }
                        try
                        {
                            sum += gameBoard[gameBoard.Count - 3][gameBoard[gameBoard.Count - 2].Count - 2 -track];
                        }
                        catch (Exception ex) { }
                        try
                        {
                            sum += gameBoard[gameBoard.Count - 3][gameBoard[gameBoard.Count - 2].Count - 1 -track];
                        }
                        catch (Exception ex) { }
                        try
                        {
                            sum += gameBoard[gameBoard.Count - 3][gameBoard[gameBoard.Count - 2].Count - 3 -track];
                        }
                        catch (Exception ex) { }

                        track++;
                        gameBoard[i].Insert(0,sum);
 

                        Console.WriteLine(sum);
                        n = sum;
                    }

                    for (int j = 0; j < preTrack.Count; j++)
                    {

                        if (j == 0)
                        {
                            int sum = 0;
                            gameBoard[preTrack[j]].Insert(0, 0);
                            try
                            {
                                sum += gameBoard[preTrack[j + 1]][0];
                            }
                            catch (Exception ex) { }
                            try
                            {
                                sum += gameBoard[preTrack[j]][1];
                            }
                            catch (Exception ex) { }
                            try
                            {
                                sum += gameBoard[gameBoard.Count - 1][0];
                            }
                            catch (Exception ex) { }
                            try
                            {
                                sum += gameBoard[gameBoard.Count - 1][1];
                            }
                            catch (Exception ex) { }
                            gameBoard[preTrack[j]][0] += sum;
                            Console.WriteLine(sum);
                            n = sum;
                        }
                        else
                        {
                            int sum = 0;
                            gameBoard[preTrack[j]].Insert(0, 0);

                            try
                            {
                                sum += gameBoard[preTrack[j - 1]][1];
                            }
                            catch (Exception ex) { }
                            try
                            {
                                sum += gameBoard[preTrack[j - 1]][0];
                            }
                            catch (Exception ex) { }
                            try
                            {
                                sum += gameBoard[preTrack[j]][1];
                            }
                            catch (Exception ex) { }
                            try
                            {
                                sum += gameBoard[preTrack[j + 1]][0];
                            }
                            catch (Exception ex) { }
                            n = sum;
                            Console.WriteLine(n);
                            gameBoard[preTrack[j]][0] = sum;
                        }
                    }

                    preTrack.Insert(0, gameBoard.Count - 1);
                    oddRow = false;
                }
                else
                {
                    int sum2 = gameBoard[gameBoard.Count - 2][0] + gameBoard[gameBoard.Count - 2][1];
                    gameBoard.Add(new List<int> {sum2});
                    n = sum2;
                    Console.WriteLine(n);


                    int i = gameBoard.Count - 1;
                    while (gameBoard[i].Count <= gameBoard[i - 2].Count)
                    {
                        n++;
                        int sum = 0;
                        gameBoard[i].Add(0);
                        try
                        {
                            sum += gameBoard[i][gameBoard[i].Count - 2];
                        }
                        catch (Exception ex) { }
                        try
                        {
                            sum += gameBoard[i-2][gameBoard[i].Count - 1];
                        }
                        catch (Exception ex) { }
                        try
                        {
                            sum += gameBoard[i-2][gameBoard[i].Count];
                        }
                        catch (Exception ex) { }
                        try
                        {
                            sum += gameBoard[i-2][gameBoard[i].Count - 2];
                        }
                        catch (Exception ex) { }

                        gameBoard[i][gameBoard[i].Count - 1] = sum;
                        Console.WriteLine(sum);
                        n = sum;
                    }
                    if (gameBoard[i - 2].Count < gameBoard[i].Count)
                    {

                        for (int j = preTrack.Count - 1; j >= 0; j--)
                        {
                            int sum = 0;
                            gameBoard[preTrack[j]].Add(0);

                            if (j == preTrack.Count - 1)
                            {
                                try
                                {
                                    sum += gameBoard[gameBoard.Count - 1][gameBoard[gameBoard.Count - 1].Count - 1];
                                }
                                catch (Exception ex) { }
                                try
                                {
                                    sum += gameBoard[gameBoard.Count - 1][gameBoard[gameBoard.Count - 1].Count - 2];
                                }
                                catch (Exception ex) { }
                                try
                                {
                                    sum += gameBoard[preTrack[j]][gameBoard[preTrack[j]].Count - 2];
                                }
                                catch (Exception ex) { }
                                try
                                {
                                    sum += gameBoard[preTrack[j - 1]][gameBoard[preTrack[j]].Count - 2];
                                }
                                catch (Exception ex) { }
                                Console.WriteLine(sum);
                            }
                            else
                            {
                                try
                                {
                                    sum += gameBoard[preTrack[j]][gameBoard[preTrack[j]].Count - 2];
                                }
                                catch (Exception ex) { }
                                try
                                {
                                    sum += gameBoard[preTrack[j + 1]][gameBoard[preTrack[j + 1]].Count - 2];
                                }
                                catch (Exception ex) { }
                                try
                                {
                                    sum += gameBoard[preTrack[j + 1]][gameBoard[preTrack[j + 1]].Count - 1];
                                }
                                catch (Exception ex) { }
                                try
                                {
                                    sum += gameBoard[preTrack[j - 1]][gameBoard[preTrack[j - 1]].Count - 1];
                                }
                                catch (Exception ex) { }
                                Console.WriteLine(sum);
                            }


                            n = sum;
                            gameBoard[preTrack[j]][gameBoard[preTrack[j]].Count - 1] = sum;
                        }

                    }
                    preTrack.Add(gameBoard.Count - 1);
                    oddRow = true;
                }
            }
            Console.Read();
        }

   }
}