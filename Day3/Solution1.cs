using System;
using System.Collections.Generic;

namespace AOC
{
    class Program
    {
        static List<List<int>> gameBoard = new List<List<int>>();
        static  bool oddRow = false;
        static int n = 6;
        static List<int> preTrack = new List<int>();

        static void Main(string[] args)
        {
            gameBoard.Add(new List<int> { 6, 1, 2 });
            gameBoard.Add(new List<int> { 5, 4, 3 });
            preTrack.Add(0);
            preTrack.Insert(0, 1);

            while (n <= 277678)
            {
                n++;
                gameBoard.Add(new List<int> { n });
                if (oddRow)
                {
                    int i = gameBoard.Count - 1;
                    
                    while(gameBoard[i].Count <= gameBoard[i - 2].Count)
                    {
                        n++;
                        gameBoard[i].Insert(0, n);
                        if (n == 277678)
                        {
                            Console.WriteLine(i.ToString() + " " + gameBoard[i].Count + " " + gameBoard[0].Count);
                        }
                    }
                    
                    for (int j = 0; j < preTrack.Count; j++)
                    {
                        n++;
                        gameBoard[preTrack[j]].Insert(0, n);
                        if (n == 277678)
                        {
                            Console.WriteLine(j.ToString() + " " + gameBoard[j].Count + " " + gameBoard[0].Count);
                        }
                    }
                    preTrack.Insert(0, gameBoard.Count - 1);
                    oddRow = false;
                }
                else
                {
                        int i = gameBoard.Count - 1;
                        while (gameBoard[i].Count <= gameBoard[i - 2].Count)
                        {
                            n++;
                            gameBoard[i].Add(n);
                            if (n == 277678)
                            {
                                //I know n will be found here so I only wrote out the calculation in this clause
                                Console.WriteLine((((gameBoard.Count-1) / 2) + ((gameBoard[i].Count-1) - (gameBoard[0].Count /2))).ToString() );
                            }
                         }
                        if (gameBoard[i - 2].Count < gameBoard[i].Count)
                        {

                            for (int j = preTrack.Count - 1; j >= 0; j--)
                            {
                                n++;
                                gameBoard[preTrack[j]].Add(n);
                                if(n == 277678)
                                {
                                    Console.WriteLine(j.ToString() + " " + gameBoard[j].Count + " " + gameBoard[0].Count);
                                }
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