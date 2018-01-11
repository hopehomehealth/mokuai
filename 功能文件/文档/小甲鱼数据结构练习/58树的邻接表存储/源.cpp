


struct Vertex
{
	char data;
	Node* first;
};

struct Node
{
	Vertex* p;//指向源节点
	Node* nextNode;
};

void create()
{

}


void main()
{
	Vertex vertexs[4];
	for (size_t i = 0; i < 4; i++)
	{
		vertexs[i].data = 'a'+i;
	}




}