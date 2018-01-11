//  [1/19/2017 Lu]
/************************************************************************/
/* 
���沨����������
Ҫ��
1. ʵ�ֶ��沨�����ʽ����
2. ֧�ִ�С���������
*/
/************************************************************************/
#include<iostream>
#include "ctype.h"
using namespace std;


//����ʹ��ջ��������vector
template<typename Element>
class Vectors
{
public:
	struct Node  //��㣬��װ�����ݺ�ָ��
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

	p_newNode->data = element; //���½��Ԫ�ظ�ֵ
	p_newNode->next = top;

	top = p_newNode; //��top�������½��
	++num; 
}


template<typename Element>
Element Vectors<Element>::pop_back()
{
	if (num < 1) return (Element)NULL;
	Node a=*top; //�ѽ�㿽������
	delete top;//ɾ��β���
	top = top->next;
	--num;
	return a.data;
}



void main()
{
	//�����ʽ�� 1.���ַ����ÿո���� 
	Vectors<double> a;
	//char *p_char = "1 2 - 4 5 + *#";
	char *p_char = "1.2 2 - 4 5 + *";
	while (*p_char != '\0')
	{

		double buffer_number;
		int i = 0;
		char num[100];
		while (isdigit(*p_char) || *p_char == '.') //�˴���������
		{
			num[i++] = *p_char;
			num[i] = '\0';	
			p_char++;
		}
		buffer_number= atof(num);

		double tem1, tem2; //�洢pop�Ľ��
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
			if (i > 0) //�ո�ǰ�������ֲ�ѹ��
			{
				a.push_back(buffer_number);
				cout << buffer_number << endl;
			}
			p_char++;
			break;

		default: //'\0' ˵�������ַ���ĩβ�����ټ�(���ܼ�������ȡ),����while���жϡ�
			break;
		}
		
	}
	cout << "���ռ�����Ϊ:" << a.pop_back();

	
}
