#include <iostream>
using namespace std;

//0 1 99分别表示自己，通，以及不通
int a[5][5] =
{
	0, 1, 1, 99, 1,
	1, 0, 99, 1, 99,
	1, 99, 0, 99, 1,
	99, 1, 99, 0, 99,
	1, 99, 1, 99, 0
};

//0没有来过
int book[5] = {0};

void DFS(int id)
{
	cout << id << endl;
	book[id] = 1;//说明遍历此点，标记此点位置
	for (size_t next_i = 0; next_i < 5; next_i++)//遍历所有周围点
	{
		//保证路通，且即将的下一点没有走过
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