typedef int Data;

class Node
{
public:
	//int ID;    //�ڵ�ID
	Data data; //�ڵ�����
	CTnode * ptr_first_child; //ָ���һ�����ӽڵ��ָ��
};


//�ڵ�
class CTnode
{
public:
	
	Node* child;//���ӽڵ��ID
	Node* ptr_next_child;//ָ�����ֵܵĽڵ�
};
