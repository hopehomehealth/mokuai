#include<iostream>
using namespace std;

/************************************************************************/
/*                  循环链表的插入与删除，以及约瑟夫问题                   */
/************************************************************************/
struct ClinkList
{
	int data;
	ClinkList *next;
};

//增加结点的数目,num表示增加结点的数目
void createClink(ClinkList *startNode,int num)
{
	ClinkList *now=startNode;//指向当前结点
	ClinkList *p;//指向最新创建的结点的指针
	for (size_t i = 0; i < num; i++)
	{
		p = new ClinkList();
		p->data = i + 1;  //给结点元素赋值
		now->next = p;    //当前结点指针域指向下一个结点
		now = p;          //下一个结点为当前最新结点
	}
	now->next = startNode;//最后一个指向首结点
}

//在某个结点之后需要插入一个新的结点
void insert(ClinkList *Node,ClinkList *dst)
{
	dst->next = Node->next;
	Node->next = dst;
}

//删除某个结点之后的一个节点,[注意]不是当前结点
void deleteNode(ClinkList *Node)
{
	ClinkList *p = Node->next;//待删除的节点
	Node->next = Node->next->next;
	cout <<"delete ID:"<< p->data<<endl;
	delete p;
}

//检查是否有环
//利用快慢指针实现
void check1(ClinkList *head_node)
{
	ClinkList *slow = head_node;
	ClinkList *fast = head_node->next;
	while (slow!=NULL&&fast!=NULL&&fast->next!=NULL)//slow指向的不是最后一个 同时 fast指向的不是最后一个以及倒二个
	{
		if (slow == fast)//检测到指向同一位置的时候
		{
			cout <<"结点为"<< slow->data << endl;
			break;
		}
		slow = slow->next;
		fast = fast->next->next;
	}
}

//检测是否有环2
//每走一格记录步数，并检测从原点出发到这个位置
void check2()
{

}




void main()
{
	ClinkList *head_node=new ClinkList();
	head_node->data = 0;
	
	createClink(head_node, 40);

	
	ClinkList *p = head_node;
	//模拟约瑟夫问题，41中杀39人,留下两个
	for (size_t i = 0; i < 39; i++)
	{
		deleteNode(p->next);
		p=p->next->next;
	}
	


	for (size_t i = 0; i < 2; i++)
	{
		cout << p->data << endl;
		p = p->next;
	}
}