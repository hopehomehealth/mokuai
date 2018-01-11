#include <iostream>
using namespace std;
#define maxSize 10
struct Node
{
	char data;
	int cur;
};


Node staticList[maxSize];

int init(Node staticList[])
{
	for (size_t i = 0; i < maxSize-2; i++)
	{
		staticList[i].cur = i + 1;
	}
	staticList[maxSize - 1].cur = 0;
	return 0;
}

int staticListMalloc(Node staticList[])
{
	int temp = staticList[0].cur;
	staticList[0].cur=staticList[temp].cur;
	return temp;
}

int strength(Node staticList[])
{
	int count = 0;
	int index=staticList[maxSize-1].cur;
	while (index!=staticList[0].cur)
	{
		count++;
		index = staticList[index].cur;
	}
	return count;
}

void staticListPrint(Node staticList[])
{
	int index = staticList[maxSize - 1].cur;
	int count = 1;
	while (index != 0)
	{
		cout << "i= "<<count << " " << staticList[index].data<<endl;
		index = staticList[index].cur;
	}
}

int staticListInsert(Node staticList[],int index,char element)
{
	//���index�ĺϷ���
	if (index<1||index>strength(staticList)+1)
	{
		return -1;
	}

	//1����ռ�
	int malloc_index = staticListMalloc(staticList);
	if (malloc_index==0)
	{
		return -1;
	}
	
	//2��ֵ
	staticList[malloc_index].data = element;

	//3����
	//��õ�i-1��Ԫ�ص��±�
	int indexOfi=1;//��1��ʼ
	int tempI=maxSize-1;
	for (; indexOfi < index;indexOfi++)
	{
		tempI = staticList[tempI].cur;
	}

	staticList[malloc_index].cur = staticList[tempI].cur;
	staticList[tempI].cur = malloc_index;
	return 0;
}


int main()
{
	init(staticList);
	staticListInsert(staticList, 1, 'A');
	staticListInsert(staticList, 2, 'B');
	staticListInsert(staticList, 3, 'D');
	staticListInsert(staticList, 3, 'C');
	staticListPrint(staticList);
	return 0;
}
