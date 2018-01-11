#include <iostream>
using namespace std;


template<typename Element>
struct List
{
	struct Node
	{
		Element data;
		Node* _next;
	};

	Node* front, *rear;
	List();
	void insert(const Element& e);
	void deleteX();
	void printAll();
};

template<typename Element>
List<Element>::List()
{
	//����ͷָ��
	front=new Node();
	front->_next = NULL;
	rear = front;
}

template<typename Element>
void List<Element>::insert(const Element& e)
{
	//�����½ڵ㣬����rearָ��ָ�����һ����
	rear->_next = new Node();
	rear = rear->_next;

	rear->data = e; //���½ڵ㸳ֵ
	rear->_next = NULL;
}

template<typename Element>
void List<Element>::deleteX()
{
	if (NULL == front->_next) return;//����Ƿ���ʣ��Ԫ������ɾ��
	Node *p_temp = (front->_next)->_next;
	cout << "ɾ����Ԫ��Ϊ" << front->_next->data << endl;
	delete (front->_next);
	front->_next= p_temp;
}

template<typename Element>
void List<Element>::printAll()
{
	Node *p = front;
	while (p->_next!=NULL)
	{
		p = p->_next;
		cout << p->data << '\t';
	}
	cout << endl;
}

void main()
{
	List<int> a;
	a.insert(1);
	a.insert(2);
	a.insert(3);
	a.insert(4);
	a.printAll();
	a.deleteX();
	a.deleteX();
	a.printAll();
	a.deleteX();
	a.printAll();
	a.deleteX();
	a.printAll();
	a.deleteX();
	a.printAll();
}

