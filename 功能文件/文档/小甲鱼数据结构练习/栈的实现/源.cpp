#include<iostream>
#include <vector>
using namespace std;


/************************************************************************/
/* �Լ�ʵ��Vector����
*/
/************************************************************************/

//typedef int MyType;


template<typename MyType>
class Vector //�Զ����vector
{
public:
	MyType* top=NULL;   //ָ��ջ��,ʵ�ʴ�Ŷ��٣����������
	MyType* base=NULL;  //ָ��ջ��
	int maxSize;

	Vector(); //�ڹ��캯���г�ʼ��
	void push_back(const MyType& element);
	void pop();
	MyType operator [](unsigned int index);
	int size();
	~Vector();//��������
};

template<class MyType>
Vector<MyType>::Vector()
{
	base = new MyType[10];
	if (base==NULL)
	{
		cout << "��ʼ��ʧ��" << endl;
		exit(0);
	}
	maxSize = 10;
	top = base;
}

template<class MyType>
void Vector<MyType>::push_back(const MyType& element)
{
	if (top-base>=maxSize)//˵���ռ䲻����!!!(top-base)�����Ѿ���ŵĸ���
	{
		maxSize=maxSize + 10; //����maxSize()
		MyType* p_temp = new MyType[maxSize];
		copy(base, top, p_temp);   //��ԭ���Ŀ�����ȥ
		
		//����ԭ��
		delete []base;               //ɾ��ԭ����
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
		return;//˵������һ����ջ
	}
	top--;
}

template<class MyType>
int Vector<MyType>::size()
{
	return top - base;
}

//����[]�����
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