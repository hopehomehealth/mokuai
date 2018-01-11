#include<iostream>
using namespace std;


//BF模式匹配，最简单的字符串匹配
void main()
{
	char dst[10] = "qeqeqewqe";
	char src[5] = "eqew";
	for (size_t i = 0; i < 10-4; i++)
	{
		for (size_t j = 0; j < 4; j++)
		{
			if (dst[i + j] != src[j]) break;
			if (3==j)
			{
				cout << "找到目标" << j << endl;
			}
		}
	}

}
