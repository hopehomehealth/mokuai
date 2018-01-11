#include <iostream>
using namespace std;

typedef char MyType;
struct Node
{
	MyType data;
	Node* l_child;
	Node* r_child;
};

typedef Node* p_node;

//����������
void CreateBiTree(p_node& T)
{
	char temp;
	cin >> temp;
	cout << "����:" << " " << temp << endl;
	if ('`'==temp)
	{
		T = NULL;
	}
	else
	{
		T = new Node();
	
		T->data = temp;
		CreateBiTree(T->l_child);
		CreateBiTree(T->r_child);
	}
	
}

//����������
void Traverse(Node* T,int level)
{
	if (T)
	{
		//��߿��Ʊ�����˳��
		Traverse(T->l_child, level + 1);
		cout <<"����: "<< T->data << "  ������" << level << endl;
		Traverse(T->r_child, level + 1);
	}

}



void main()
{
	Node* p=new Node();
	
	CreateBiTree(p);
	cout << "create succeed" << endl<<endl;

	Traverse(p, 1);
}
