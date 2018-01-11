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
	//创建头指针
	front=new Node();
	front->_next = NULL;
	rear = front;
}

template<typename Element>
void List<Element>::insert(const Element& e)
{
	//创建新节点，并把rear指针指向最后一个。
	rear->_next = new Node();
	rear = rear->_next;

	rear->data = e; //给新节点赋值
	rear->_next = NULL;
}

template<typename Element>
void List<Element>::deleteX()
{
	if (NULL == front->_next) return;//检查是否有剩余元素用于删除
	Node *p_temp = (front->_next)->_next;
	cout << "删除的元素为" << front->_next->data << endl;
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

