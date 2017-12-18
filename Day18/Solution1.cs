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
        static string line;
        static StreamReader file = new StreamReader("input.txt");
        static List<string[]> input = new List<string[]>();
        static Dictionary<string, long> register = new Dictionary<string, long>();
        static Dictionary<string, long> sounds = new Dictionary<string, long>();
        static int n;//so I can use TryParse
        static int o;//so I can use TryParse again
        static void Main(string[] args)
        {
			/*I had been trying to do these all in PHP
			but they're growing tedious so today I went back to C#
			for something different*/
            while ((line = file.ReadLine()) != null)
            {
                input.Add(line.Split(' '));
            }
            for (int i = 0; i < input.Count; i++)
            {
                switch (input[i][0])
                {
                    case "set":
                        if (register.ContainsKey(input[i][1]))
                        {
                            if (int.TryParse(input[i][2], out n))
                            {
                                register[input[i][1]] = n;
                            }
                            else
                            {
                                register[input[i][1]] = register[input[i][2]];
                            }
                        }
                        else
                        {
                            if (int.TryParse(input[i][2], out n))
                            {
                                register.Add(input[i][1], n);
                            }
                            else
                            {
                                register.Add(input[i][1], register[input[i][2]]);
                            }
                        }
                        break;
                    case "add":
                        if (int.TryParse(input[i][2], out n))
                        {
                            register[input[i][1]] += n;
                        }
                        else
                        {
                            register[input[i][1]] += register[input[i][2]];
                        }
                        break;
                    case "mul":
                        try
                        {
                            if (int.TryParse(input[i][2], out n))
                            {
                                register[input[i][1]] *= n;
                            }
                            else
                            {
                                register[input[i][1]] *= register[input[i][2]];
                            }
                        }
                        catch (Exception e)
                        {
                            register.Add(input[i][1], 0);
                        }
                        break;
                    case "mod":
                        if (int.TryParse(input[i][2], out n))
                        {
                            register[input[i][1]] = register[input[i][1]] % n;
                        }
                        else
                        {
                            register[input[i][1]] = register[input[i][1]] % register[input[i][2]];
                        }
                        break;
                    case "jgz":
                        if (int.TryParse(input[i][1], out n))
                        {
                            if(n > 0)
                            {
                                if (int.TryParse(input[i][2], out o))
                                {
                                    i += o;
                                }
                                else
                                {
                                    i += Convert.ToInt32(register[input[i][2]]);
                                }
                                i--;
                            }
                        }
                        else if(register[input[i][1]] > 0)
                        {
                            if (int.TryParse(input[i][2], out n))
                            {
                                i += n;
                            }
                            else
                            {
                                i += Convert.ToInt32(register[input[i][2]]);
                            }
                            i--;
                        }
                        break;
                    case "snd":
                        if (sounds.ContainsKey(input[i][1]))
                        {
                            sounds[input[i][1]] = Convert.ToInt32(register[input[i][1]]);
                        }
                        else
                        {
                            sounds.Add(input[i][1], register[input[i][1]]);
                        }
                        Console.WriteLine("Sound played: " + register[input[i][1]]);
                        break;
                    case "rcv":
                        try
                        {
                            if (register[input[i][1]] > 0)
                            {
                                Console.WriteLine("Recovered for register " + input[i][1]);
                                i = input.Count;
                            }
                            else
                            {
                                Console.WriteLine("Recovered nothing for register " + input[i][1]);
                            }
                        }
                        catch(Exception ex)
                        {
                            Console.WriteLine("Recovered nothing for register " + input[i][1]);
                        }
                        break;
                    default:
                        break;
                }
                if (i < 0)
                {
                    break;
                }
            }
 
            Console.Read();
        }
    }
}