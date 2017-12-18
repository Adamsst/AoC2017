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
        static Dictionary<string, long> register1 = new Dictionary<string, long>();
        static Dictionary<string, long> sounds = new Dictionary<string, long>();
        static List<long> reg0SendQueue = new List<long>();
        static List<long> reg1SendQueue = new List<long>();
        static int n;//so I can use TryParse
        static int o;//so I can use TryParse again
        static int reg0Track = 0;
        static int reg1Track = 0;
        static int p1Send = 0;
        static int bothwait = 0;
        static bool run = true;
        static void Main(string[] args)
        {
			/*This part was very easy if you're willing to just copy/paste part 1 twice.
			I think an interesting challenge for the future would be to actually
			make this a multithreaded solution with two separate threads and no large
			copy & paste*/
            while ((line = file.ReadLine()) != null)
            {
                input.Add(line.Split(' '));
            }
            register.Add("p", 0);
            register1.Add("p", 1);
            while (run)
            {
                #region register0
                for (int i = reg0Track; i < input.Count; i++)
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
                                if (n > 0)
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
                            else if (register[input[i][1]] > 0)
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
                            reg0SendQueue.Add(register[input[i][1]]);
                            Console.WriteLine("Send added to reg0queue: " + register[input[i][1]]);
                            break;
                        case "rcv":
                            if (reg1SendQueue.Count > 0)
                            {
                                register[input[i][1]] = reg1SendQueue[0];
                                reg1SendQueue.RemoveAt(0);
                            }
                            else
                            {
                                Console.WriteLine("Waiting on send1 queue...");
                                reg0Track = i;
                                i = input.Count;
                                bothwait++;
                            }
                            break;
                        default:
                            break;
                    }
 
                }
                #endregion
 
                #region register1
                for (int i = reg1Track; i < input.Count; i++)
                {
                    switch (input[i][0])
                    {
                        case "set":
                            if (register1.ContainsKey(input[i][1]))
                            {
                                if (int.TryParse(input[i][2], out n))
                                {
                                    register1[input[i][1]] = n;
                                }
                                else
                                {
                                    register1[input[i][1]] = register1[input[i][2]];
                                }
                            }
                            else
                            {
                                if (int.TryParse(input[i][2], out n))
                                {
                                    register1.Add(input[i][1], n);
                                }
                                else
                                {
                                    register1.Add(input[i][1], register1[input[i][2]]);
                                }
                            }
                            break;
                        case "add":
                            if (int.TryParse(input[i][2], out n))
                            {
                                register1[input[i][1]] += n;
                            }
                            else
                            {
                                register1[input[i][1]] += register1[input[i][2]];
                            }
                            break;
                        case "mul":
                            try
                            {
                                if (int.TryParse(input[i][2], out n))
                                {
                                    register1[input[i][1]] *= n;
                                }
                                else
                                {
                                    register1[input[i][1]] *= register1[input[i][2]];
                                }
                            }
                            catch (Exception e)
                            {
                                register1.Add(input[i][1], 0);
                            }
                            break;
                        case "mod":
                            if (int.TryParse(input[i][2], out n))
                            {
                                register1[input[i][1]] = register1[input[i][1]] % n;
                            }
                            else
                            {
                                register1[input[i][1]] = register1[input[i][1]] % register1[input[i][2]];
                            }
                            break;
                        case "jgz":
                            if (int.TryParse(input[i][1], out n))
                            {
                                if (n > 0)
                                {
                                    if (int.TryParse(input[i][2], out o))
                                    {
                                        i += o;
                                    }
                                    else
                                    {
                                        i += Convert.ToInt32(register1[input[i][2]]);
                                    }
                                    i--;
                                }
                            }
                            else if (register1[input[i][1]] > 0)
                            {
                                if (int.TryParse(input[i][2], out n))
                                {
                                    i += n;
                                }
                                else
                                {
                                    i += Convert.ToInt32(register1[input[i][2]]);
                                }
                                i--;
                            }
                            break;
                        case "snd":
                            reg1SendQueue.Add(register1[input[i][1]]);
                            p1Send++;
                            Console.WriteLine("Send added to reg1queue: " + register1[input[i][1]]);
                            break;
                        case "rcv":
                            if (reg0SendQueue.Count > 0)
                            {
                                register1[input[i][1]] = reg0SendQueue[0];
                                reg0SendQueue.RemoveAt(0);
                            }
                            else
                            {
                                Console.WriteLine("Waiting on send0 queue...");
                                reg1Track = i;
                                i = input.Count;
                                if(bothwait == 1)
                                {
                                    run = false;
                                    i = input.Count;
                                }
                            }
                            break;
                        default:
                            break;            
                    }
                    bothwait = 0;
                }
                #endregion
            }
			Console.WriteLine(p1Send);
            Console.Read();
        }
    }
}