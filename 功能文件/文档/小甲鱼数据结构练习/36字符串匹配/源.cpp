#include<iostream>
using namespace std;


//BFģʽƥ�䣬��򵥵��ַ���ƥ��
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
				cout << "�ҵ�Ŀ��" << j << endl;
			}
		}
	}

}
