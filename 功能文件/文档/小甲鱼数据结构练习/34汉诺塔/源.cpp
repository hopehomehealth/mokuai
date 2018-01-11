#include <iostream>
using namespace std;

//@n 代表柱子x上的盘子的数目
//@xyz 分别代表柱子的名字
//x上有n个盘子，借助y，移动到z上
void moveX(int n,char x,char y,char z)
{
	if (1==n)
	{
		cout << x<<"->"<<z<<endl;
	}
	else
	{
		moveX(n - 1, x, z, y); //将 n-1个 从x借助z移动到y上
		cout << x << "->" << z << endl;       //将 剩下一个 从x直接移动到z上
		moveX(n - 1, y, x, z);
	}
}

void main()
{

	moveX(3, 'X','Y','Z');
}