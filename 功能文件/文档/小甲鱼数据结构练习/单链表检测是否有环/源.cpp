#include<iostream>
using namespace std;

/************************************************************************/
/*                  ѭ������ļ��ʱ���л�     
����һ�����������Ŀ=1��nextֻ��һ������������һ���ԣ�������ֻ�����ֻ���ڡ�β�������֣�������һ���ԣ�����������
1.����ָ�룬����л����ָ��һ�����ڻ��в�ͣѭ������ָ�����ڲ���Ϊ1�����뻷һ����Ϳ�ָ������
2.��㷨��һ��ָ���ȱ���ÿ����㣬Ȼ������һָ���ԭ������������㣬�����߲����Ƿ�һ����
*/
/************************************************************************/
struct ClinkList
{
	int data;
	ClinkList *next;
};

//����Ƿ��л�
//���ÿ���ָ��ʵ��
void check1(ClinkList *head_node)
{
	ClinkList *slow = head_node;
	ClinkList *fast = head_node->next;
	while (slow != NULL&&fast != NULL&&fast->next != NULL)//slowָ��Ĳ������һ�� ͬʱ fastָ��Ĳ������һ���Լ�������
	{
		if (slow == fast)//��⵽ָ��ͬһλ�õ�ʱ��
		{
			cout << "���Ϊ" << slow->data << endl;
			break;
		}
		slow = slow->next;
		fast = fast->next->next;
	}
}

//����Ƿ��л�2
//ÿ��һ���¼������������ԭ����������λ��
void check2(ClinkList *head_node)
{
	ClinkList *behind = head_node;
	ClinkList *front = head_node;
	int front_steps=0;
	int behind_steps=0;
	while (front!=NULL)
	{
		behind_steps = 0;		
		behind = head_node;     //��ָ��ÿ�ζ��Ǵ�ͷ������,������ҲҪ����
		while (behind!=front)	//�����λ�õ�behind������
		{
			behind=behind->next;
			behind_steps++;
		}
		if (behind_steps!=front_steps)
		{
			cout << "���ڻ�:" << behind_steps << endl;
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
	for (int i = 1; i <= 20;i++)//���ⴴ��20���ڵ�
	{
		temp->next = new ClinkList();
		temp = temp->next;//tempָ����һ�����
		temp->data = i;
	}
//	temp->next = NULL;
	temp->next = head_node->next;//���ڲ�����
	//check1(head_node);

	check2(head_node);


	//�������ӡ����
	ClinkList *p = head_node;
	for (size_t i = 0; i < 21; i++)
	{
		cout << p->data << endl;
		p = p->next;
	}
}