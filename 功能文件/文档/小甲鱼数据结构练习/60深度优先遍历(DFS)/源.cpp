#include <iostream>
using namespace std;

//0 1 99�ֱ��ʾ�Լ���ͨ���Լ���ͨ
int a[5][5] =
{
	0, 1, 1, 99, 1,
	1, 0, 99, 1, 99,
	1, 99, 0, 99, 1,
	99, 1, 99, 0, 99,
	1, 99, 1, 99, 0
};

//0û������
int book[5] = {0};

void DFS(int id)
{
	cout << id << endl;
	book[id] = 1;//˵�������˵㣬��Ǵ˵�λ��
	for (size_t next_i = 0; next_i < 5; next_i++)//����������Χ��
	{
		//��֤·ͨ���Ҽ�������һ��û���߹�
		if (1==a[id][next_i]&&0==book[next_i])
		{
			DFS(next_i);
		}
	}
}


void main()
{
	DFS(0);
}