
#include <iostream>
using namespace std;
enum MyEnum{ thread,address} a;

typedef struct Node
{
	char data;
	int l_left_tag;
	int l_right_tag;
	Node* l_child;
	Node* r_child;
} *p_node;



//创建二叉树
void CreateBiTree(p_node& T)
{
	char temp;
	cin >> temp;
	cout << "输入:" << " " << temp << endl;
	if ('`' == temp)
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