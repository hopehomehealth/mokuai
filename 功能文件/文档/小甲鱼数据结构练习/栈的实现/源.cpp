#include<iostream>
#include <vector>
using namespace std;


/************************************************************************/
/* 自己实现Vector部分
*/
/************************************************************************/

//typedef int MyType;


template<typename MyType>
class Vector //自定义的vector
{
public:
	MyType* top=NULL;   //指向栈顶,实际存放多少，由这个决定
	MyType* base=NULL;  //指向栈底
	int maxSize;

	Vector(); //在构造函数中初始化
	void push_back(const MyType& element);
	void pop();
	MyType operator [](unsigned int index);
	int size();
	~Vector();//析构函数
};

template<class MyType>
Vector<MyType>::Vector()
{
	base = new MyType[10];
	if (base==NULL)
	{
		cout << "初始化失败" << endl;
		exit(0);
	}
	maxSize = 10;
	top = base;
}

template<class MyType>
void Vector<MyType>::push_back(const MyType& element)
{
	if (top-base>=maxSize)//说明空间不够，!!!(top-base)代表已经存放的个数
	{
		maxSize=maxSize + 10; //更新maxSize()
		MyType* p_temp = new MyType[maxSize];
		copy(base, top, p_temp);   //把原来的拷贝进去
		
		//析构原来
		delete []base;               //删除原来的
		top = p_temp + (top - base);
		base = p_temp;
	}
	*(top) = element;
	top++;
}

template<class MyType>
void Vector<MyType>::pop()
{
	if (top - base<=0)
	{
		return;//说明这是一个空栈
	}
	top--;
}

template<class MyType>
int Vector<MyType>::size()
{
	return top - base;
}

//重载[]运算符
template<class MyType>
MyType Vector<MyType>::operator [](unsigned int index)
{
	return *(base + index);
}

template<class MyType>
Vector<MyType>::~Vector()
{
	delete []base;
}



void main()
{
	//cout << sizeof(int) << endl;


	Vector<int> a;
	
	for (size_t i = 0; i < 2999; i++)
	{
		a.push_back(i);
	}
	for (size_t i = 0; i < 2999; i++)
	{
		cout << a[i] << endl;
	}
}