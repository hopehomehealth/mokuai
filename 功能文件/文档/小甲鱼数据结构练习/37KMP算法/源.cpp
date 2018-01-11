#include<iostream>
using namespace std;

int calc_partial(const char *p,int num)//用于计算部分匹配值
{
	for (size_t j = 1; j < num; j++) //由j控制长度
	{
		for (size_t i = 0; i < num-j; i++)//遍历前缀
		{	
		//	cout <<"---  "<< *(p + i) << endl;
			if (*(p + i) != *(p + i + j))
			{
				break;
			}
			if ((i + 1) == num - j)
			{
			//	cout << *(p + i) << endl;
				return num - j;
			}
		}
	}
	return 0;
}

void main()
{
	char *src = "ABCDABD";
	char *dst = "BBC ABCDAB ABCDABCDABDE";

	//计算字符串的长度
	int num_src = 0;
	int num_dst = 0;
	char *p_temp = src;
	while (true)
	{
		if ('\0'==*(p_temp++)) break;
		num_src++;
	}
	p_temp = dst;
	while (true)
	{
		if ('\0' == *(p_temp++)) break;
		num_dst++;
	}

	//计算next数组
	int *p_next = new int[num_src];
	for (size_t i = 0; i < num_src; i++)
	{
		*(p_next + i) = (i+1 - calc_partial(src, i + 1));
	}
	for (size_t i = 0; i < num_src; i++)
	{
		cout << "i=" << *(p_next + i) << endl;
	}

	//开始执行匹配
	for (size_t i = 0; i <= num_dst-num_src;)//遍历待匹配字符串
	{
		cout <<"开始匹配的："<< dst[i] << endl;
		for (size_t j = 0; j < num_src; j++)
		{
			if (dst[i + j] != src[j])
			{
				if (0 == j) i++;
				else
					i += (*(p_next + j-1));

				cout <<"j="<<j<<"  "<< *(p_next + j) << endl;
				break;
			}
			if (num_src == (j+1))
			{
				cout << "找到目标" << j << endl;
			}
		}
	}


	delete []p_next;
}