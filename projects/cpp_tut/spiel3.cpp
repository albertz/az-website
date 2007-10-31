// This is a demo program (www.az2000.de/projects/cpp_tut)
// copyright by Albert Zeyer

#include <iostream>
#include <termios.h> // for tc*attr (for getch)
#include <stdlib.h> // for *rand
#include <time.h> // for time (for randomize)

using namespace std;

int getch() {
	static int ch = -1, fd = 0;
	struct termios neu, alt;
	fd = fileno(stdin);
	tcgetattr(fd, &alt);
	neu = alt;
	neu.c_lflag &= ~(ICANON|ECHO);
	tcsetattr(fd, TCSANOW, &neu);
	ch = getchar();
	tcsetattr(fd, TCSANOW, &alt);
	return ch;
}

void randomize() {
	srand(time(NULL));
}

struct Kugel {
	char c;
	int x;
	int y;
};

struct World {
	int width;
	int height;
	Kugel kugeln[5];
};

int World_KugelnCount(World& w) {
	return sizeof(w.kugeln) / sizeof(Kugel);
}

void clear_screen() {
	cout << "\33[2J";
	cout << "\r";
}

void draw_line(int width, char c) {
	for(int x = 0; x < width; x++) {
		cout << c;
	}
}

void World_draw_debug(World& w) {
	for(int i = 0; i < World_KugelnCount(w); i++) {
		cout << w.kugeln[i].c;
		cout << " (" << w.kugeln[i].x;
		cout << "," << w.kugeln[i].y;
		cout << ")" << endl; 
	}
	cout << endl;
}

void World_draw(World& w) {
	clear_screen();

	World_draw_debug(w);
	
	bool draw_this_line;
	char c;
	
	draw_line(w.width + 2, 'o');
	cout << endl;
	for(int y = 0; y < w.height; y++) {
		cout << 'o';

		draw_this_line = false;
		for(int i = 0; i < World_KugelnCount(w); i++) {
			if(w.kugeln[i].y == y)
				draw_this_line = true;
		}
		if(draw_this_line) {
			for(int x = 0; x < w.width; x++) {
				c = ' ';
				for(int i = 0; i < World_KugelnCount(w); i++) {
					if(w.kugeln[i].x == x && w.kugeln[i].y == y) {
						if(c == ' ')
							c = w.kugeln[i].c;
						else {
							c = 'X';
							break;
						}	
					}
				}
				cout << c;
			}
		} else
			draw_line(w.width, ' ');

		cout << 'o' << endl;
	}
	draw_line(w.width + 2, 'o');

	cout.flush();	
}

void Kugel_move(World& w, int i, int x, int y) {
	Kugel& k = w.kugeln[i];
	k.x += x;
	k.y += y;
	if(k.x < 0) k.x = 0;
	if(k.y < 0) k.y = 0;
	if(k.x >= w.width) k.x = w.width - 1;
	if(k.y >= w.height) k.y = w.height - 1;
}

int main() {
	randomize();

	int screen_width = 20;
	int screen_height = 10;

	int input1 = 0;
	int input2 = 1;

	World myWorld;
	myWorld.width = screen_width;
	myWorld.height = screen_height;
	char kugelc = 'A';
	for(int i = 0; i < World_KugelnCount(myWorld); i++) {
		myWorld.kugeln[i].c = kugelc;
		kugelc++;
		myWorld.kugeln[i].x = rand() % myWorld.width;
		myWorld.kugeln[i].y = rand() % myWorld.height;
	}

	char input = 0;
	bool end = false;
	while(!end) {
		switch(input) {
		case 27: //ESC
			end = true;
			break;

		case 'w':
			Kugel_move(myWorld, input1, 0, -1);
			break;
		case 's':
			Kugel_move(myWorld, input1, 0, 1);
			break;
		case 'a':
			Kugel_move(myWorld, input1, -1, 0);
			break;
		case 'd':
			Kugel_move(myWorld, input1, 1, 0);
			break;

		case 'i':
			Kugel_move(myWorld, input2, 0, -1);
			break;
		case 'k':
			Kugel_move(myWorld, input2, 0, 1);
			break;
		case 'j':
			Kugel_move(myWorld, input2, -1, 0);
			break;
		case 'l':
			Kugel_move(myWorld, input2, 1, 0);
			break;

		case 'e': // change
			input = getch();
			if('1' <= input && input <= '9')
				input1 = input - '1';
			break;

		case 'o': // change
			input = getch();
			if('1' <= input && input <= '9')
				input2 = input - '1';
			break;

		default:
			break;
		}

		World_draw(myWorld);

		input = getch();
	}

	cout << endl << endl;
	cout << "Have fun :)" << endl;
	return 0;
}

