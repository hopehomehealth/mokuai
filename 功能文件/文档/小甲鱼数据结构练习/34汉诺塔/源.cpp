#include <iostream>
using namespace std;

//@n ��������x�ϵ����ӵ���Ŀ
//@xyz �ֱ�������ӵ�����
//x����n�����ӣ�����y���ƶ���z��
void moveX(int n,char x,char y,char z)
{
	if (1==n)
	{
		cout << x<<"->"<<z<<endl;
	}
	else
	{
		moveX(n - 1, x, z, y); //�� n-1�� ��x����z�ƶ���y��
		cout << x << "->" << z << endl;       //�� ʣ��һ�� ��xֱ���ƶ���z��
		moveX(n - 1, y, x, z);
	}
}

void main()
{

	moveX(3, 'X','Y','Z');
}