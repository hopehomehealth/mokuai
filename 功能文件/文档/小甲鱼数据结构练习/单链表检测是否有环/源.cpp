#include<iostream>
using namespace std;

/************************************************************************/
/*                  循环链表的检查时候有环     
链表一个结点连接数目=1（next只有一个），根据这一特性，如果出现环，则只会在“尾部”出现，根据这一特性，有两个方法
1.快慢指针，如果有环则快指针一定会在换中不停循环，慢指针由于步进为1，进入环一定会和快指针相遇
2.结点法，一个指针先遍历每个结点，然后另外一指针从原点出发到这个结点，看两者步数是否一样。
*/
/************************************************************************/
struct ClinkList
{
	int data;
	ClinkList *next;
};

//检查是否有环
//利用快慢指针实现
void check1(ClinkList *head_node)
{
	ClinkList *slow = head_node;
	ClinkList *fast = head_node->next;
	while (slow != NULL&&fast != NULL&&fast->next != NULL)//slow指向的不是最后一个 同时 fast指向的不是最后一个以及倒二个
	{
		if (slow == fast)//检测到指向同一位置的时候
		{
			cout << "结点为" << slow->data << endl;
			break;
		}
		slow = slow->next;
		fast = fast->next->next;
	}
}

//检测是否有环2
//每走一格记录步数，并检测从原点出发到这个位置
void check2(ClinkList *head_node)
{
	ClinkList *behind = head_node;
	ClinkList *front = head_node;
	int front_steps=0;
	int behind_steps=0;
	while (front!=NULL)
	{
		behind_steps = 0;		
		behind = head_node;     //后指针每次都是从头结点出发,计数器也要清零
		while (behind!=front)	//在这个位置等behind过来。
		{
			behind=behind->next;
			behind_steps++;
		}
		if (behind_steps!=front_steps)
		{
			cout << "存在环:" << behind_steps << endl;
			break;
		}

		front = front->next;
		front_steps++;
	}
}




void main()
{
	ClinkList *head_node = new ClinkList();
	head_node->data = 0;

	ClinkList *temp = head_node;
	for (int i = 1; i <= 20;i++)//额外创建20个节点
	{
		temp->next = new ClinkList();
		temp = temp->next;//temp指向下一个结点
		temp->data = i;
	}
//	temp->next = NULL;
	temp->next = head_node->next;//用于产生环
	//check1(head_node);

	check2(head_node);


	//把链表打印出来
	ClinkList *p = head_node;
	for (size_t i = 0; i < 21; i++)
	{
		cout << p->data << endl;
		p = p->next;
	}
}