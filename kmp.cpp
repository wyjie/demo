#include <iostream>
#include <string>

/**
 * 模式匹配 KMP算法
 */
class KMP
{
        std::string pat;
        int    M;
        int * next;
public:
        // create Knuth-Morris-Pratt NFA from pattern
        KMP(const std::string& pattern)
                : pat(pattern), M(pattern.length())
        {
                next = new int[M];
                int i, j = -1;
                for (i = 0; i < M; i++)
                {
                        if ( i == 0 ) next[i] = -1;
                        else if ( pat[i] != pat[j] ) next[i] = j;
                        else next[i] = next[j];
                        while ( j >= 0 && pat[i] != pat[j] )
                                j = next[j];
                        j++;
                }

                for (i = 0; i < M; i++)
                        std::cout << "next[" << i << "] = " << next[i] << std::endl;
        }
        ~KMP() { delete [] next; }

        // return offset of first occurrence of text in pattern (or N if no match)
    // simulate the NFA to find match
    int search(const std::string& text)
        {
        int N = text.length();
        int i, j;
        for (i = 0, j = 0; i < N && j < M; i++) {
            while (j >= 0 && text[i] != pat[j])
                j = next[j];
            j++;
        }
        if (j == M) return i - M;
        return N;
    }
};

int main()
{
        std::string pattern = "ababaca";
        KMP kmp(pattern);
        std::string text = "abababaca";
        int offset = kmp.search(text);

        std::cout << text << std::endl;
        for (int i = 0; i < offset; i++)
                std::cout << " ";
        std::cout << pattern << std::endl;
}
