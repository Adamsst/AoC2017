using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Drawing;
using System.IO;

namespace Pathfinding
{
    class Program
    {
        static List<string> input = new List<string>();
        static Dictionary<Point, int> map = new Dictionary<Point, int>();
        static int group = 0;
        static void Main(string[] args)
        {
            //Here I read the binary input produced by a php file from Part 1.
            //This input is zero-buffered on the edges so I can avoid exception
            //handling on edge cases (see Solution2Input.php).
            //I originally tried to work this part in PHP but switched to C# 
            //due to my comfort level with C# Lists/Dictionarys and the Point class.
            //I will rewrite in PHP eventually as I want to complete this challenge
            //entirely in PHP (see similar situation in Day 3).

            string line;
            StreamReader file = new StreamReader("input.txt");
            while ((line = file.ReadLine()) != null)
            {
                input.Add(line);
            }

            for (int i = 0; i < input.Count; i++)
            {
                for (int j = 0; j < input[i].Length; j++)
                {
                    map.Add(new Point(i, j), 0);
                }
            }

            for (int i = 1; i < input.Count - 1; i++)
            {
                for (int j = 1; j < input[i].Length - 1; j++)
                {
                    Point p = new Point(i, j);
                    List<Point> tempCheck = new List<Point>();
                    if (input[i][j] == '1' && map[p] == 0)
                    {
                        group++;
                        map[p] = group;
                        tempCheck.Add(new Point(i + 1, j));
                        tempCheck.Add(new Point(i - 1, j));
                        tempCheck.Add(new Point(i, j + 1));
                        tempCheck.Add(new Point(i, j - 1));
                    }
                    while (tempCheck.Count > 0)
                    {
                        for (int k = 0; k < tempCheck.Count; k++)
                        {
                            if (map[tempCheck[k]] > 0)
                            {
                                tempCheck.RemoveAt(k);
                            }
                            else if (input[tempCheck[k].X][tempCheck[k].Y] == '0')
                            {
                                tempCheck.RemoveAt(k);
                            }
                            else if (input[tempCheck[k].X][tempCheck[k].Y] == '1' && map[tempCheck[k]] == 0)
                            {
                                map[tempCheck[k]] = group;
                                tempCheck.Add(new Point(tempCheck[k].X - 1, tempCheck[k].Y));
                                tempCheck.Add(new Point(tempCheck[k].X + 1, tempCheck[k].Y));
                                tempCheck.Add(new Point(tempCheck[k].X, tempCheck[k].Y - 1));
                                tempCheck.Add(new Point(tempCheck[k].X, tempCheck[k].Y + 1));
                            }

                        }
                    }
                }
            }

            Console.WriteLine(group);
            Console.Read();
        }
    }
}