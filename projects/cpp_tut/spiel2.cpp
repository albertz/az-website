// This is a demo program (www.az2000.de/projects/cpp_tut)
// copyright by Albert Zeyer

#include <iostream>
#include <unistd.h> // for usleep

using namespace std;

struct Kugel {
	char c;
	int x;
	int y;
};

struct World {
	int width;
	int height;
	Kugel kugeln[2];
};

int World_KugelnCount(World& w) {
	return sizeof(w.kugeln) / sizeof(Kugel);
}

void clear_screen() {
	cout << "\33[2J";
	cout << "\r";
}

void World_draw(World& w) {
	clear_screen();
	
	bool draw_this_line;
	bool kugel_drawed;
	for(int y = 0; y <= w.height; y++) {
		draw_this_line = false;
		for(int i = 0; i < World_KugelnCount(w); i++) {
			if(w.kugeln[i].y == y)
				draw_this_line = true;
		}
		if(draw_this_line) {
			for(int x = 0; x <= w.width; x++) {
				kugel_drawed = false;
				for(int i = 0; i < World_KugelnCount(w); i++) {
					if(w.kugeln[i].x == x && w.kugeln[i].y == y) {
						cout << w.kugeln[i].c;
						kugel_drawed = true;
						break;
					}
				}
				if(!kugel_drawed)
					cout << ' ';
			}
		}
		cout << endl;
	}

	cout.flush();	
}

int main() {
	int screen_width = 20;
	int screen_height = 10;

	World myWorld;
	myWorld.width = screen_width;
	myWorld.height = screen_height;
	myWorld.kugeln[0].c = 'A';
	myWorld.kugeln[0].x = 0;
	myWorld.kugeln[0].y = 0;
	myWorld.kugeln[1].c = 'B';
	myWorld.kugeln[1].x = myWorld.width;
	myWorld.kugeln[1].y = myWorld.height;

	for(int pos_x = 0; pos_x <= screen_width; pos_x++) {
		myWorld.kugeln[0].x = pos_x;
		myWorld.kugeln[1].x = screen_width - pos_x;

		World_draw(myWorld);

		usleep(200 * 1000);
	}

	cout << endl << "Have fun :)" << endl;
	return 0;
}
