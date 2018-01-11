//  [1/19/2017 Lu]
/************************************************************************/
/* 
【逆波兰计算器】
要求：
1. 实现对逆波兰表达式计算
2. 支持带小数点的数据
*/
/************************************************************************/
#include<iostream>
#include "ctype.h"
using namespace std;


//这里使用栈链表事先vector
template<typename Element>
class Vectors
{
public:
	struct Node  //结点，封装了数据和指针
	{
		Element data;
		Node *next;
	}* top;  
	int num = 0;
	Vectors();
	void push_back(const Element& element);
	Element pop_back();
};


template<typename Element>
Vectors<Element>::Vectors()
{
	top = NULL;
}


template<typename Element>
void Vectors<Element>::push_back(const Element& element)
{
	Node *p_newNode = new Node();

	p_newNode->data = element; //将新结点元素赋值
	p_newNode->next = top;

	top = p_newNode; //把top移至最新结点
	++num; 
}


template<typename Element>
Element Vectors<Element>::pop_back()
{
	if (num < 1) return (Element)NULL;
	Node a=*top; //把结点拷贝出来
	delete top;//删除尾结点
	top = top->next;
	--num;
	return a.data;
}



void main()
{
	//输入格式： 1.数字符号用空格隔开 
	Vectors<double> a;
	//char *p_char = "1 2 - 4 5 + *#";
	char *p_char = "1.2 2 - 4 5 + *";
	while (*p_char != '\0')
	{

		double buffer_number;
		int i = 0;
		char num[100];
		while (isdigit(*p_char) || *p_char == '.') //此处接受数字
		{
			num[i++] = *p_char;
			num[i] = '\0';	
			p_char++;
		}
		buffer_number= atof(num);

		double tem1, tem2; //存储pop的结果
		switch (*p_char)
		{
		case '+':
			tem1 = a.pop_back();
			tem2 = a.pop_back();
			a.push_back(tem2 + tem1);
			p_char++;
			break;
		case '-':
			tem1 = a.pop_back();
			tem2 = a.pop_back();
			a.push_back(tem2 - tem1);
			p_char++;
			break;
		case '*':
			tem1 = a.pop_back();
			tem2 = a.pop_back();
			a.push_back(tem2 * tem1);
			p_char++;
			break;
		case '/':
			tem1 = a.pop_back();
			tem2 = a.pop_back();
			a.push_back(tem2 / tem1);
			p_char++;
			break;
		case ' ':
			if (i > 0) //空格前面是数字才压入
			{
				a.push_back(buffer_number);
				cout << buffer_number << endl;
			}
			p_char++;
			break;

		default: //'\0' 说明到达字符串末尾不能再加(不能继续向后读取),用于while的判断。
			break;
		}
		
	}
	cout << "最终计算结果为:" << a.pop_back();

	
}
