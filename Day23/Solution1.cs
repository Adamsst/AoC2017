using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace aocday23
{
    class Program
    {
        static string line;
        static long mul = 0;
        static StreamReader file = new StreamReader("input.txt");
        static List<string[]> input = new List<string[]>();
        static Dictionary<string, long> register = new Dictionary<string, long>();
        static int n;//so I can use TryParse
        static int o;//so I can use TryParse again
        static void Main(string[] args)
        {
            /*I did Day 18 in C# so I'm going to do this similar
            follow up question in C# as well*/
            while ((line = file.ReadLine()) != null)
            {
                input.Add(line.Split(' '));
            }
            register.Add("a", 0);
            register.Add("b", 0);
            register.Add("c", 0);
            register.Add("d", 0);
            register.Add("e", 0);
            register.Add("f", 0);
            register.Add("g", 0);
            register.Add("h", 0);
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
                    case "sub":
                        if (int.TryParse(input[i][2], out n))
                        {
                            register[input[i][1]] -= n;
                        }
                        else
                        {
                            register[input[i][1]] -= register[input[i][2]];
                        }
                        break;
                    case "mul":
                        mul++;
                        if (int.TryParse(input[i][2], out n))
                        {
                            register[input[i][1]] *= n;
                        }
                        else
                        {
                            register[input[i][1]] *= register[input[i][2]];
                        }
                        break;
                    case "jnz":
                        if (int.TryParse(input[i][1], out n))
                        {
                            if (n != 0)
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
                        else if (register[input[i][1]] != 0)
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
                    default:
                        break;
                }
                if (i < 0)
                {
                    break;
                }
            }
            Console.WriteLine(mul);
            Console.Read();
        }
    }
}
