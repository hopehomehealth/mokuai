#include<iostream>
using namespace std;

int calc_partial(const char *p,int num)//���ڼ��㲿��ƥ��ֵ
{
	for (size_t j = 1; j < num; j++) //��j���Ƴ���
	{
		for (size_t i = 0; i < num-j; i++)//����ǰ׺
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

	//�����ַ����ĳ���
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

	//����next����
	int *p_next = new int[num_src];
	for (size_t i = 0; i < num_src; i++)
	{
		*(p_next + i) = (i+1 - calc_partial(src, i + 1));
	}
	for (size_t i = 0; i < num_src; i++)
	{
		cout << "i=" << *(p_next + i) << endl;
	}

	//��ʼִ��ƥ��
	for (size_t i = 0; i <= num_dst-num_src;)//������ƥ���ַ���
	{
		cout <<"��ʼƥ��ģ�"<< dst[i] << endl;
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
				cout << "�ҵ�Ŀ��" << j << endl;
			}
		}
	}


	delete []p_next;
}