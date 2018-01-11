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

//创建二叉树
void CreateBiTree(p_node& T)
{
	char temp;
	cin >> temp;
	cout << "输入:" << " " << temp << endl;
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

//遍历二叉树
void Traverse(Node* T,int level)
{
	if (T)
	{
		//这边控制遍历的顺序
		Traverse(T->l_child, level + 1);
		cout <<"数据: "<< T->data << "  层数：" << level << endl;
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
