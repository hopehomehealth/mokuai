#include <iostream>
using namespace std;



int f(int n)
{
	if (0 == n)
	{
		return 0;
	}

	if (1==n)
	{
		return 1;
	}
	
	return f(n - 2) + f(n - 1);
}


void main()
{
	for (size_t i = 0; i < 100; i++)
	{
		cout << "i=" << i <<": "<<f(i)<< endl;
	}
}