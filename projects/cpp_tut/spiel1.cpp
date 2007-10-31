// This is a demo program (www.az2000.de/projects/cpp_tut)
// copyright by Albert Zeyer

#include <iostream>
#include <unistd.h> // for usleep

using namespace std;

struct Kugel {
	char c;
	int x;
	int y; //TODO
};

void clear_screen() {
	cout << "\33[2J";
	cout << "\r";
}

int main() {
	int screen_width = 80;
	int screen_height = 40; // TODO

	Kugel myKugel;
	myKugel.c = 'X';
	myKugel.x = 0;
	myKugel.y = 0;

	for(int pos_x = 0; pos_x <= screen_width; pos_x++) {
		myKugel.x = pos_x;

		clear_screen();
		for(int x = 0; x <= screen_width; x++) {
			if(myKugel.x == x)
				cout << myKugel.c;
			else
				cout << ' ';
		}

		cout.flush();
		usleep(100 * 1000);
	}

	cout << endl << "Have fun :)" << endl;
	return 0;
}
