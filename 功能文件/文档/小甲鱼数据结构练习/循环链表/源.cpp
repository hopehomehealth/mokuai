#include<iostream>
using namespace std;

/************************************************************************/
/*                  ѭ������Ĳ�����ɾ�����Լ�Լɪ������                   */
/************************************************************************/
struct ClinkList
{
	int data;
	ClinkList *next;
};

//���ӽ�����Ŀ,num��ʾ���ӽ�����Ŀ
void createClink(ClinkList *startNode,int num)
{
	ClinkList *now=startNode;//ָ��ǰ���
	ClinkList *p;//ָ�����´����Ľ���ָ��
	for (size_t i = 0; i < num; i++)
	{
		p = new ClinkList();
		p->data = i + 1;  //�����Ԫ�ظ�ֵ
		now->next = p;    //��ǰ���ָ����ָ����һ�����
		now = p;          //��һ�����Ϊ��ǰ���½��
	}
	now->next = startNode;//���һ��ָ���׽��
}

//��ĳ�����֮����Ҫ����һ���µĽ��
void insert(ClinkList *Node,ClinkList *dst)
{
	dst->next = Node->next;
	Node->next = dst;
}

//ɾ��ĳ�����֮���һ���ڵ�,[ע��]���ǵ�ǰ���
void deleteNode(ClinkList *Node)
{
	ClinkList *p = Node->next;//��ɾ���Ľڵ�
	Node->next = Node->next->next;
	cout <<"delete ID:"<< p->data<<endl;
	delete p;
}

//����Ƿ��л�
//���ÿ���ָ��ʵ��
void check1(ClinkList *head_node)
{
	ClinkList *slow = head_node;
	ClinkList *fast = head_node->next;
	while (slow!=NULL&&fast!=NULL&&fast->next!=NULL)//slowָ��Ĳ������һ�� ͬʱ fastָ��Ĳ������һ���Լ�������
	{
		if (slow == fast)//��⵽ָ��ͬһλ�õ�ʱ��
		{
			cout <<"���Ϊ"<< slow->data << endl;
			break;
		}
		slow = slow->next;
		fast = fast->next->next;
	}
}

//����Ƿ��л�2
//ÿ��һ���¼������������ԭ����������λ��
void check2()
{

}




void main()
{
	ClinkList *head_node=new ClinkList();
	head_node->data = 0;
	
	createClink(head_node, 40);

	
	ClinkList *p = head_node;
	//ģ��Լɪ�����⣬41��ɱ39��,��������
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