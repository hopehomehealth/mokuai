#include <iostream>
using namespace std;
double functionX(double a)
{
	return a - 1000;
}



int find(double a,double b)//输入阈值
{
	cout << "二分一次: " << a <<" "<< b<<endl;
	if (abs(functionX((a + b)/ 2))<0.1)
	{
		cout << (a+b)/2;
		return 0;
	}
	if (functionX((a + b) / 2)<0) //
	{
		find((a + b) / 2, b);
	}
	else
	{
		find(a, (a + b) / 2);
	}
	return 0;
}

void main()
{
	find(0, 1000000);
}