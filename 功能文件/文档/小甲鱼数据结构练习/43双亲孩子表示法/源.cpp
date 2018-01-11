typedef int Data;

class Node
{
public:
	//int ID;    //节点ID
	Data data; //节点数据
	CTnode * ptr_first_child; //指向第一个孩子节点的指针
};


//节点
class CTnode
{
public:
	
	Node* child;//孩子节点的ID
	Node* ptr_next_child;//指向其兄弟的节点
};
